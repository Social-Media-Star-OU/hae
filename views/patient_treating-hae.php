<!DOCTYPE html>
<html lang="et">
  <head>
    <title><?=L::page_patient_treating_title;?></title>
    <?php require "components/head.php"; ?>
  </head>
  <body class="patient-article node-9 node-en path-node page-node-type-article has-glyphicons">
    <a href="#main-content" class="visually-hidden focusable skip-link"> <?=L::page_dialog_skip;?> </a>
    <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
      <div class="Mobile-top-block container">
        <div class="region region-mobile-top-block">
          <section id="block-topblockformobileonly" class="for-mobile-only block block-block-content block-block-content9275e390-a9fa-4a90-a24f-efc7495c20f0 clearfix">
            <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
              <p><?=L::page_dialog_top;?></p>
            </div>
          </section>
        </div>
      </div>
      <?php require "components/patientHeader.php"; ?>
      <div role="main" class="main-container container js-quickedit-main-content">
        <div class="row">
          <section class="col-sm-12">
            <div class="highlighted">
              <div class="region region-highlighted">
                <div data-drupal-messages-fallback class="hidden"></div>
              </div>
            </div>
            <a id="main-content"></a>
            <div class="region region-content">
              <h1 class="page-header">
                <span property="schema:name"><?=L::page_patient_treating_topTitle;?></span>
              </h1>
              <article data-history-node-id="9" role="article" about="/patsient/mis-on-hae/hae-ravimine" typeof="schema:Article" class="article full clearfix">
                <span property="schema:name" content="how is hereditary angioedema treated?" class="hidden"></span>
                <div class="content">
                  <div class="field field--name-field-content field--type-entity-reference-revisions field--label-hidden field--items">
                    <div class="field--item">
                      <div class="paragraph paragraph--type--all-paragraphs paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="field field--name-field-all-paras field--type-entity-reference-revisions field--label-hidden field--items">
                          <div class="field--item">
                            <div class="paragraph paragraph--type--formatted-text-para paragraph--view-mode--default">
                              <div class="field field--name-field-formatted-text field--type-text-long field--label-hidden field--item">
                                <p></p>
                                <p><?=L::page_patient_treating_topAlt;?></p>
                                <p></p>
                                <blockquote>
                                  <h4><?=L::page_patient_treating_preventive;?></h4>
                                  <p><?=L::page_patient_treating_preventiveAlt;?> <sup>1, 2</sup>
                                  </p>
                                </blockquote>
                                <blockquote>
                                  <h4><?=L::page_patient_treating_onDemand;?></h4>
                                  <p><?=L::page_patient_treating_onDemandAlt;?>³</p>
                                </blockquote>
                                <p></p>
                                <p><?=L::page_patient_treating_aﬀects;?>
                                   <sup>1, 4</sup>
                                </p>
                                <p></p>
                              </div>
                            </div>
                          </div>
                          <div class="field--item">
                            <div class="paragraph paragraph--type--link-para paragraph--view-mode--default custom-link-para">
                              <div class="field field--name-field-link field--type-link field--label-hidden field--item">
                                <a href="https://haei.org/about-haei/globally/"><?=L::page_patient_treating_talkDoctor;?></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--image-papa paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="field field--name-field-icon-image field--type-image field--label-hidden field--item">
                          <img loading="lazy" src="../../assets/images/disanto-side-face-897x470.png" width="897" height="470" alt="" typeof="foaf:Image" class="img-responsive" />
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--good-to-know paragraph--view-mode--default gtk col-xs-12 col-sm-12 col-md-6 col-lg-6 patient">
                        <div class='row col-md-12 good-to-know'>
                          <div class='gtk-icn-img col-md-6'>
                            <div class="field field--name-field-icon-image field--type-image field--label-hidden field--item">
                              <img loading="lazy" src="../../assets/images/icon-gtk-patient_4d283.png?itok=bot7Xnul" width="53" height="53" alt="" typeof="foaf:Image" class="img-responsive" />
                            </div>
                            <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_treating_goodtoknow;?></div>
                          </div>
                          <div class='gtk-desc col-md-12'>
                            <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                              <p><?=L::page_patient_treating_goodtoknowAlt;?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
          </section>
        </div>
      </div>
      <div class="next_page container" role="contentinfo" aria-label="next_page">
        <div class="region region-next-page">
          <section class="views-element-container block block-views block-views-blocknext-page-block-1 clearfix" id="block-views-block-next-page-block-1">
            <div class="form-group">
              <div class="view view-next-page view-id-next_page view-display-id-block_1 js-view-dom-id-e593e191607da048e09b75f6666cbe7a63d88e76b1d9e84cb235b49a282354fe">
                <div class="view-content">
                  <div class="views-row">
                    <div class="views-field views-field-field-next-page">
                      <div class="field-content">
                        <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-moju"><?=L::page_patient_treating_living;?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
      <?php require "components/footer.php"; ?>
    </div>
    <?php require "components/javascript.php"; ?>
  </body>
</html>