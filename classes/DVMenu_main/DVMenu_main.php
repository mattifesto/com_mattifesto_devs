<?php

final class
DVMenu_main {

    /**
     * @return void
     */
    static function
    CBInstall_install(
    ): void {
        $updater = CBModelUpdater::fetch(
            (object)[
                'className' => 'CBMenu',
                'ID' => DVMenu_main::ID(),
                'title' => 'Website',
                'titleURI' => '/',
            ]
        );

        CBModelUpdater::save(
            $updater
        );

        CB_StandardPageFrame::setDefaultMainMenuModelCBID(
            DVMenu_main::ID()
        );
    }
    /* CBInstall_install() */



    /**
     * @return [string]
     */
    static function
    CBInstall_requiredClassNames(
    ): array {
        return [
            'CB_StandardPageFrame',
            'CBMenu',
            'CBModelUpdater',
        ];
    }
    /* CBInstall_requiredClassNames() */



    /**
     * @return ID
     */
    static function ID(): string {
        return '69f06ac760fe2db6a29105305c38f46799214b84';
    }
}
