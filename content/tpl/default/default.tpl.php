<?php

	//$hook_order = PHOOK::$hook_order;

	//hookMod($hook_order[0]);
        hookMod('start');

        // DOCTYPE
        WF::Html()->doctype();
                // HTML
                WF::Html()->html();
                //HEAD META
                WF::Html()->head();
                                //hookMod($hook_order[1]);
                                hookMod('meta');
                                WF::Html()->linkcss(BASE_SCRIPT."?" . "zone" . "=" . WF::TPL()->zone . '&' . CSS_GET . "=" . CSS_GLOBAL . "&" . CSS_TARGET . "=" . WF::TPL()->name);
                WF::Html()->head();
                // BODY
                WF::Html()->body();
                // HEADER
                        WF::Html()->div("header");
                                // HEADER
                                //hookMod($hook_order[2]);
                                hookMod('header');
                                // MENU
                                //hookMod($hook_order[3]);
                                hookMod('menu');
                        WF::Html()->enddiv();
                // PAGE
                        WF::Html()->div("global");
                                // ADD PAGE
                                WF::Html()->div("background");
                                        WF::Html()->div("content");
                                                hookMod('body_left');
                                                        WF::Html()->div("page");
                                                                addPage(WF::TPL()->name);
                                                        WF::Html()->enddiv();
                                                hookMod('body_right');
                                        WF::Html()->enddiv();
                                WF::Html()->enddiv();
                        WF::Html()->enddiv();
                        // FOOTER
                        WF::Html()->div("footer");
                                // HOOK FOOTER
                                //hookMod($hook_order[6]);
                                hookMod('footer');
                                //
                        WF::Html()->enddiv();
                        WF::Html()->div("hidden");
                                // HOOK HIDDEN
                                //hookMod($hook_order[7]);
                                hookMod('hidden');
                        WF::Html()->enddiv();
                // BODY END
                WF::Html()->endbody();
        // HTML END
        WF::Html()->endhtml();

?>
