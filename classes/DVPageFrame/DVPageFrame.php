<?php

final class
DVPageFrame {

    /**
     * @return void
     */
    static function CBInstall_install(): void {
        CBPageFrameCatalog::install(__CLASS__);
    }



    /**
     * @return [string]
     */
    static function CBInstall_requiredClassNames(): array {
        return ['CBPageFrameCatalog'];
    }



    /**
     * @param function $renderContent
     *
     * @return void
     */
    static function CBPageFrame_render(callable $renderContent): void {
        CBView::render((object)[
            'className' => 'DVPageHeaderView',
        ]);

        $renderContent();

        CBView::render((object)[
            'className' => 'DVPageFooterView',
        ]);
    }



    /**
     * @return string
     */
    static function
    CBPageFrame_replacementPageFrameClassName(
    ): string {
        return 'CB_StandardPageFrame';
    }
    /* CBPageFrame_replacementPageFrameClassName() */

}
