<?php

declare(strict_types=1);

namespace pxgamer\Arionum\Models;

use pxgamer\Arionum\Transaction\Version;
use pxgamer\Arionum\Transaction\TransactionFactory;

class Transaction
{
    /**
     * @deprecated
     *
     * @see Version::STANDARD
     *
     * The transaction version for sending to an address.
     */
    public const VERSION_STANDARD = Version::STANDARD;
    /**
     * @deprecated
     *
     * @see Version::ALIAS_SEND
     *
     * The transaction version for sending to an alias.
     */
    public const VERSION_ALIAS_SEND = Version::ALIAS_SEND;
    /**
     * @deprecated
     *
     * @see Version::ALIAS_SET
     *
     * The transaction version for setting an alias.
     */
    public const VERSION_ALIAS_SET = Version::ALIAS_SET;
    /**
     * @deprecated
     *
     * @see Version::MASTERNODE_CREATE
     *
     * The transaction version for creating a masternode.
     */
    public const VERSION_MASTERNODE_CREATE = Version::MASTERNODE_CREATE;
    /**
     * @deprecated
     *
     * @see Version::MASTERNODE_PAUSE
     *
     * The transaction version for pausing a masternode.
     */
    public const VERSION_MASTERNODE_PAUSE = Version::MASTERNODE_PAUSE;
    /**
     * @deprecated
     *
     * @see Version::MASTERNODE_RESUME
     *
     * The transaction version for resuming a masternode.
     */
    public const VERSION_MASTERNODE_RESUME = Version::MASTERNODE_RESUME;
    /**
     * @deprecated
     *
     * @see Version::MASTERNODE_RELEASE
     *
     * The transaction version for releasing a masternode.
     */
    public const VERSION_MASTERNODE_RELEASE = Version::MASTERNODE_RELEASE;

    /** The default value for masternode commands. */
    public const VALUE_MASTERNODE_COMMAND = 0.00000001;
    /** The default fee for masternode commands. */
    public const FEE_MASTERNODE_COMMAND = 0.00000001;
    /** The value for masternode creation. */
    public const VALUE_MASTERNODE_CREATE = 100000;
    /** The value for masternode creation. */
    public const FEE_MASTERNODE_CREATE = 10;
    /** The value for alias creation. */
    public const VALUE_ALIAS_SET = 0.00000001;
    /** The fee for alias creation. */
    public const FEE_ALIAS_SET = 10;

    /**
     * The value to send in the transaction.
     *
     * @var float
     *
     * @deprecated
     *
     * @see getValue()
     */
    public $val;
    /**
     * The fee for the transaction.
     *
     * @var float
     *
     * @deprecated
     *
     * @see getFee()
     */
    public $fee;
    /**
     * The destination address.
     *
     * @var string
     *
     * @deprecated
     *
     * @see getDestinationAddress()
     */
    public $dst;
    /**
     * The sender's public key.
     *
     * @var string
     *
     * @deprecated
     *
     * @see getPublicKey()
     */
    public $public_key;
    /**
     * The transaction signature.
     * It's recommended that the transaction is signed to avoid sending your private key to the node.
     *
     * @var string
     *
     * @deprecated
     *
     * @see getSignature()
     */
    public $signature;
    /**
     * The sender's private key. Only required if no signature is provided.
     *
     * @var string
     *
     * @deprecated
     *
     * @see getPrivateKey()
     */
    public $private_key;
    /**
     * The transaction date in unix timestamp format.
     * This is required when the transaction is pre-signed.
     *
     * @see https://epochconverter.com
     *
     * @var int
     *
     * @deprecated
     *
     * @see getDate()
     */
    public $date;
    /**
     * A message to be included with the transaction. Maximum 128 chars.
     *
     * @var string
     *
     * @deprecated
     *
     * @see getMessage()
     */
    public $message;
    /**
     * The version of the transaction.
     *
     * @var int
     *
     * @deprecated
     *
     * @see getVersion()
     */
    public $version = Version::STANDARD;

    /**
     * Retrieve a pre-populated Transaction instance for sending to an alias.
     *
     * @param  string  $alias
     * @param  float  $value
     * @param  string  $message
     *
     * @return self
     *
     * @deprecated
     *
     * @see TransactionFactory::makemakeAliasSendInstance()
     */
    public static function makeAliasSendInstance(string $alias, float $value, string $message = ''): self
    {
        return TransactionFactory::makeAliasSendInstance($alias, $value, $message);
    }

    /**
     * Retrieve a pre-populated Transaction instance for setting an alias.
     *
     * @param  string  $address
     * @param  string  $alias
     *
     * @return self
     *
     * @deprecated
     *
     * @see TransactionFactory::makeAliasSetInstance()
     */
    public static function makeAliasSetInstance(string $address, string $alias): self
    {
        return TransactionFactory::makeAliasSetInstance($address, $alias);
    }

    /**
     * Retrieve a pre-populated Transaction instance for creating a masternode.
     *
     * @param  string  $ipAddress
     * @param  string  $address
     *
     * @return self
     *
     * @deprecated
     *
     * @see TransactionFactory::makeMasternodeCreateInstance()
     */
    public static function makeMasternodeCreateInstance(string $ipAddress, string $address): self
    {
        return TransactionFactory::makeMasternodeCreateInstance($ipAddress, $address);
    }

    /**
     * Retrieve a pre-populated Transaction instance for pausing a masternode.
     *
     * @param  string  $address
     *
     * @return self
     *
     * @deprecated
     *
     * @see TransactionFactory::makeMasternodePauseInstance()
     */
    public static function makeMasternodePauseInstance(string $address): self
    {
        return TransactionFactory::makeMasternodePauseInstance($address);
    }

    /**
     * Retrieve a pre-populated Transaction instance for resuming a masternode.
     *
     * @param  string  $address
     *
     * @return self
     *
     * @deprecated
     *
     * @see TransactionFactory::makeMasternodeResumeInstance()
     */
    public static function makeMasternodeResumeInstance(string $address): self
    {
        return TransactionFactory::makeMasternodeResumeInstance($address);
    }

    /**
     * Retrieve a pre-populated Transaction instance for releasing a masternode.
     *
     * @param  string  $address
     *
     * @return self
     *
     * @deprecated
     *
     * @see TransactionFactory::makeMasternodeReleaseInstance()
     */
    public static function makeMasternodeReleaseInstance(string $address): self
    {
        return TransactionFactory::makeMasternodeReleaseInstance($address);
    }

    /**
     * @param  float  $value
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeValue()
     */
    public function setValue(float $value): self
    {
        return $this->changeValue($value);
    }

    /**
     * @param  float  $fee
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeFee()
     */
    public function setFee(float $fee): self
    {
        return $this->changeFee($fee);
    }

    /**
     * @param  string  $destinationAddress
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeDestinationAddress()
     */
    public function setDestinationAddress(string $destinationAddress): self
    {
        return $this->changeDestinationAddress($destinationAddress);
    }

    /**
     * @param  string  $publicKey
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changePublicKey()
     */
    public function setPublicKey(string $publicKey): self
    {
        return $this->changePublicKey($publicKey);
    }

    /**
     * @param  string  $signature
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeSignature()
     */
    public function setSignature(string $signature): self
    {
        return $this->changeSignature($signature);
    }

    /**
     * @param  string  $privateKey
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changePrivateKey()
     */
    public function setPrivateKey(string $privateKey): self
    {
        return $this->changePrivateKey($privateKey);
    }

    /**
     * @param  int  $date
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeDate()
     */
    public function setDate(int $date): self
    {
        return $this->changeDate($date);
    }

    /**
     * @param  string  $message
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeMessage()
     */
    public function setMessage(string $message): self
    {
        return $this->changeMessage($message);
    }

    /**
     * @param  int  $version
     *
     * @return $this
     *
     * @deprecated
     *
     * @see changeVersion()
     */
    public function setVersion(int $version): self
    {
        return $this->changeVersion($version);
    }

    /**
     * @param  float  $value
     *
     * @return $this
     */
    public function changeValue(float $value): self
    {
        $this->val = $value;

        return $this;
    }

    /**
     * @param  float  $fee
     *
     * @return $this
     */
    public function changeFee(float $fee): self
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * @param  string  $destinationAddress
     *
     * @return $this
     */
    public function changeDestinationAddress(string $destinationAddress): self
    {
        $this->dst = $destinationAddress;

        return $this;
    }

    /**
     * @param  string  $publicKey
     *
     * @return $this
     */
    public function changePublicKey(string $publicKey): self
    {
        $this->public_key = $publicKey;

        return $this;
    }

    /**
     * @param  string  $signature
     *
     * @return $this
     */
    public function changeSignature(string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * @param  string  $privateKey
     *
     * @return $this
     */
    public function changePrivateKey(string $privateKey): self
    {
        $this->private_key = $privateKey;

        return $this;
    }

    /**
     * @param  int  $date
     *
     * @return $this
     */
    public function changeDate(int $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @param  string  $message
     *
     * @return $this
     */
    public function changeMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param  int  $version
     *
     * @return $this
     */
    public function changeVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getValue(): float
    {
        return $this->val;
    }

    public function getFee(): float
    {
        return $this->fee;
    }

    public function getDestinationAddress(): string
    {
        return $this->dst;
    }

    public function getPublicKey(): string
    {
        return $this->public_key;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function getPrivateKey(): ?string
    {
        return $this->private_key;
    }

    public function getDate(): int
    {
        return $this->date;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function toArray(): array
    {
        return [
            'date' => $this->getDate(),
            'dst' => $this->getDestinationAddress(),
            'fee' => $this->getFee(),
            'message' => $this->getMessage(),
            'private_key' => $this->getPrivateKey(),
            'public_key' => $this->getPublicKey(),
            'signature' => $this->getSignature(),
            'val' => $this->getValue(),
            'version' => $this->getVersion(),
        ];
    }
}