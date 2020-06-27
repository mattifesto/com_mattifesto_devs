<?php

final class DVMenu_main {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'className' => 'CBMenu',
                'ID' => DVMenu_main::ID(),
                'title' => 'Website',
                'titleURI' => '/',
            ]
        );

        CBModelUpdater::save($updater);
    }

    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return [
            'CBMenu',
            'CBModelUpdater',
        ];
    }

    /**
     * @return ID
     */
    static function ID(): string {
        return '69f06ac760fe2db6a29105305c38f46799214b84';
    }
}
