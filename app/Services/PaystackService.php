<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;


class PaystackService
{
    protected $secretKey;
    protected $publicKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->secretKey = config('services.paystack.secret_key');
        $this->publicKey = config('services.paystack.public_key');
        $this->baseUrl = config('services.paystack.payment_url');
    }

    /**
     * Generate transaction reference
     */
    public function generateReference()
    {
        return 'paystack_' . time() . '_' . Str::random(10);
    }

    /**
     * Initialize payment
     */
    public function initializePayment($data)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
                'Content-Type' => 'application/json',
            ])->post($this->baseUrl . '/transaction/initialize', $data);

            $result = $response->json();

            if ($response->successful() && $result['status']) {
                return [
                    'status' => true,
                    'data' => $result['data'],
                    'message' => $result['message']
                ];
            }

            return [
                'status' => false,
                'message' => $result['message'] ?? 'Payment initialization failed'
            ];

        } catch (\Exception $e) {
            Log::error('Paystack initialization error: ' . $e->getMessage());
            return [
                'status' => false,
                'message' => 'Payment service unavailable'
            ];
        }
    }

    /**
     * Verify payment
     */
    public function verifyPayment($reference)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
            ])->get($this->baseUrl . '/transaction/verify/' . $reference);

            $result = $response->json();

            if ($response->successful() && $result['status']) {
                return [
                    'status' => true,
                    'data' => $result['data']
                ];
            }

            return [
                'status' => false,
                'message' => $result['message'] ?? 'Payment verification failed'
            ];

        } catch (\Exception $e) {
            Log::error('Paystack verification error: ' . $e->getMessage());
            return [
                'status' => false,
                'message' => 'Payment verification failed'
            ];
        }
    }

    /**
     * Get all transactions
     */
    public function getAllTransactions($perPage = 50)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->secretKey,
            ])->get($this->baseUrl . '/transaction', [
                'perPage' => $perPage
            ]);

            return $response->json();

        } catch (\Exception $e) {
            Log::error('Paystack get transactions error: ' . $e->getMessage());
            return ['status' => false, 'message' => 'Failed to fetch transactions'];
        }
    }
}