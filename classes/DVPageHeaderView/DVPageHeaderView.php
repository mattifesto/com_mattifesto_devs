<?php

final class
DVPageHeaderView {

    /**
     * @param object $model
     *
     * @return void
     */
    static function
    CBView_render(
        stdClass $model
    ): void {
        $selectedMainMenuItemName = CBModel::valueToString(
            CBHTMLOutput::pageInformation(),
            'selectedMainMenuItemName'
        );

        ?>

        <header class="DVPageHeaderView CBDarkTheme">
            <?php

            CBView::renderSpec(
                (object)[
                    'className' => 'CB_CBView_MainHeader',
                ]
            );

            CBView::render(
                (object)[
                    'className' => 'CBMenuView',
                    'menuID' => DVMenu_main::ID(),
                    'selectedItemName' => $selectedMainMenuItemName,
                ]
            );

            ?>
        </header>

        <?php
    }
    /* CBView_render() */

}
