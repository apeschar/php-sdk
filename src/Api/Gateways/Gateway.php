<?php declare(strict_types=1);
/**
 * Copyright © 2019 MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 */

namespace MultiSafepay\Api\Gateways;

use MultiSafepay\Exception\InvalidDataInitializationException;

/**
 * Class Gateway
 * @package MultiSafepay\Api\Gateways
 * phpcs:disable ObjectCalisthenics.Files.FunctionLength
 */
class Gateway
{
    /**
     * Known gateway codes
     */
    const AFTERPAY = 'AFTERPAY';
    const BANKTRANS = 'BANKTRANS';
    const CREDITCARD = 'CREDITCARD';
    const DIRECTBANK = 'DIRECTBANK';
    const DIRDEB = 'DIRDEB';
    const EINVOICE = 'EINVOICE';
    const EPS = 'EPS';
    const FASHIONCHQ = 'FASHIONCHQ';
    const FASHIONGFT = 'FASHIONGFT';
    const GIROPAY = 'GIROPAY';
    const IDEAL = 'IDEAL';
    const IDEALQR = 'IDEALQR';
    const KLARNA = 'KLARNA';
    const MAESTRO = 'MAESTRO';
    const MASTERCARD = 'MASTERCARD';
    const MISTERCASH = 'MISTERCASH';
    const PAYAFTER = 'PAYAFTER';
    const SANTANDER = 'SANTANDER';
    const TRUSTLY = 'TRUSTLY';
    const VISA = 'VISA';
    const VVVBON = 'VVVBON';

    /**
     * @var string
     */
    private $id = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $type = '';

    /**
     * Transaction constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->validate($data);
        $this->id = $data['id'];
        $this->description = $data['description'];
        $this->type = $data['type'] ?? '';
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param array $data
     * @return bool
     */
    private function validate(array $data): bool
    {
        if (empty($data['id']) || empty($data['description'])) {
            throw new InvalidDataInitializationException('No ID or description');
        }

        return true;
    }

    /**
     * @return array
     */
    public static function getKnownGateways(): array
    {
        return [
            self::AFTERPAY,
            self::BANKTRANS,
            self::CREDITCARD,
            self::DIRDEB,
            self::DIRECTBANK,
            self::EINVOICE,
            self::EPS,
            self::FASHIONCHQ,
            self::FASHIONGFT,
            self::GIROPAY,
            self::IDEAL,
            self::IDEALQR,
            self::KLARNA,
            self::MASTERCARD,
            self::MAESTRO,
            self::MISTERCASH,
            self::PAYAFTER,
            self::SANTANDER,
            self::TRUSTLY,
            self::VISA,
            self::VVVBON,
        ];
    }
}
