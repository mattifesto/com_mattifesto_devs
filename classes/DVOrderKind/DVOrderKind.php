<?php

final class
DVOrderKind {

    /* -- CBInstall interfaces -- -- -- -- -- */



    /**
     * @return void
     */
    static function
    CBInstall_configure(
    ): void {
        $updater = new CBModelUpdater(
            SCPreferences::getModelCBID()
        );

        SCPreferences::setDefaultOrderKindClassName(
            $updater->getSpec(),
            __CLASS__
        );

        CBDB::transaction(
            function () use (
                $updater
            ) {
                $updater->save2();
            }
        );
    }
    /* CBInstall_configure() */



    /* -- SCOrderKind interfaces -- -- -- -- -- */



    /**
     * @param string $countryCode
     *
     * @return string
     */
    static function
    SCOrderKind_countryCodeToCountryName(
        string $countryCode
    ): string {
        $matches = array_filter(
            DVOrderKind::SCOrderKind_countryOptions(),
            function ($countryOption) use ($countryCode) {
                if ($countryOption->value === $countryCode) {
                    return true;
                } else {
                    return false;
                }
            }
        );

        $count = count($matches);

        if ($count === 1) {
            return $matches[0]->title;
        } else {
            throw new CBExceptionWithValue(
                "{$count} country options matched the country code provided.",
                $countryCode,
                '9c8c4b21068a4ecabba8952f4a2701e7ad929f6c'
            );
        }
    }
    /* SCOrderKind_countryCodeToCountryName() */



    /**
     * @return [object]
     */
    static function
    SCOrderKind_countryOptions() {
        return [
            (object)[
                'isDefault' => true,
                'title' => 'United States',
                'value' => '05f424ec527ab05463ec1451fad73db282044a1d',
            ]
        ];
    }
    /* SCOrderKind_countryOptions() */



    /**
     * @param string $countyOptionValue
     *
     * @return string
     */
    static function
    SCOrderKind_countryOptionValueToCountryCode(
        string $countyOptionValue
    ): string {
        $matches = array_filter(
            DVOrderKind::SCOrderKind_countryOptions(),
            function ($countryOption) use ($countyOptionValue) {
                if ($countryOption->value === $countyOptionValue) {
                    return true;
                } else {
                    return false;
                }
            }
        );

        $count = count($matches);

        if ($count === 1) {
            return $countyOptionValue;
        } else {
            throw new CBExceptionWithValue(
                (
                    "{$count} country options matched the country " .
                    "option value provided."
                ),
                $countyOptionValue,
                '6b2e7b9ccfdca900232d37fe96cbded8f4f146b2'
            );
        }
    }
    /* SCOrderKind_countryOptionValueToCountryCode() */



    /**
     * @return string
     */
    static function
    SCOrderKind_defaultShippingMethod(): string {
        return 'Flat Rate Shipping';
    }



    /**
     * @param object $orderSpec
     *
     * @return int
     */
    static function
    SCOrderKind_salesTaxInCents(
        stdClass $orderSpec
    ): int {
        $taxableAmountInCents = SCOrder::calculateTaxableAmountInCents(
            $orderSpec
        );

        return ceil(
            $taxableAmountInCents *
            0.10
        );
    }
    /* SCOrderKind_salesTaxInCents() */



    /**
     * @param object $orderSpec
     *
     * @return int
     */
    static function
    SCOrderKind_shippingChargeInCents(
        stdClass $orderSpec
    ): int {
        return 1000;
    }
    /* SCOrderKind_shippingChargeInCents() */

}
/* DVOrderKind */
