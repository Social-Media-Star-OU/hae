<!DOCTYPE html>
<html lang="et">
  <head>
    <title><?=L::page_patient_diagnosing_title;?></title> 
    <?php require "components/head.php"; ?>
  </head>
  <body class="patient-article node-8 node-en path-node page-node-type-article has-glyphicons">
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
                <span property="schema:name"><?=L::page_patient_diagnosing_topTitle;?></span>
              </h1>
              <article data-history-node-id="8" role="article" about="/patsient/mis-on-hae/hae-diagnoosimine" typeof="schema:Article" class="article full clearfix">
                <span property="schema:name" content="<?=L::page_patient_diagnosing_topTitle;?>" class="hidden"></span>
                <div class="content">
                  <div class="field field--name-field-content field--type-entity-reference-revisions field--label-hidden field--items">
                    <div class="field--item">
                      <div class="paragraph paragraph--type--formatted-text-para paragraph--view-mode--default col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="field field--name-field-formatted-text field--type-text-long field--label-hidden field--item">
                          <h4></h4>
                          <h4><?=L::page_patient_diagnosing_topAlt;?>¹</h4>
                          <p></p>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--background-img-with-text-para paragraph--view-mode--default custom-carousel-paragraph col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="bg-img-with-content-block" style="background-image: url('../../assets/images/alexandra-face-half-and-half-897x386-v2.png');">
                          <div class="bg-img-text-header for-mobile img">
                            <h4>
                              <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_diagnosing_appointment;?></div>
                            </h4>
                          </div>
                          <div class="for-mobile img">
                            <div class="field field--name-field-bg-image field--type-image field--label-hidden field--item">
                              <img loading="lazy" src="../../assets/images/alexandra-face-half-and-half-897x386-v2.png" width="897" height="386" alt="" typeof="foaf:Image" class="img-responsive" />
                            </div>
                            <div class="data-element">
                              <div class="bg-img-text-header">
                                <h4>
                                  <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_diagnosing_appointment;?></div>
                                </h4>
                              </div>
                              <div class="bg-img-text-desc">
                                <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                                  <p><?=L::page_patient_diagnosing_appointmentAlt;?>²</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--all-paragraphs paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="field field--name-field-all-paras field--type-entity-reference-revisions field--label-hidden field--items">
                          <div class="field--item">
                            <div class="paragraph paragraph--type--good-to-know paragraph--view-mode--default gtk patient">
                              <div class='row col-md-12 good-to-know'>
                                <div class='gtk-icn-img col-md-6'>
                                  <div class="field field--name-field-icon-image field--type-image field--label-hidden field--item">
                                    <img loading="lazy" src="../../assets/images/icon-gtk-patient_87d6e.png?itok=LpR_Jd2g" width="53" height="53" alt="" typeof="foaf:Image" class="img-responsive" />
                                  </div>
                                  <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_diagnosing_goodtoknow;?></div>
                                </div>
                                <div class='gtk-desc col-md-12'>
                                  <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                                    <p><?=L::page_patient_diagnosing_goodtoknowAlt;?>³</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="field--item">
                            <div class="paragraph paragraph--type--impact-questionnaire-para paragraph--view-mode--default"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">
                      <div class="paragraph paragraph--type--all-paragraphs paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="field field--name-field-all-paras field--type-entity-reference-revisions field--label-hidden field--items">
                          <div class="field--item">
                            <div class="paragraph paragraph--type--formatted-text-para paragraph--view-mode--default">
                              <div class="field field--name-field-formatted-text field--type-text-long field--label-hidden field--item">
                                <h4><?=L::page_patient_diagnosing_testHAE;?></h4>
                                <p><?=L::page_patient_diagnosing_testHAEalt;?>²</p>
                                <p></p>
                              </div>
                            </div>
                          </div>
                          <div class="field--item">
                            <div class="paragraph paragraph--type--impact-questionnaire-para paragraph--view-mode--default">
                              <div class="field field--name-field-additional-para1 field--type-entity-reference-revisions field--label-hidden field--items">
                                <div class="field--item">
                                  <div class="paragraph paragraph--type--good-to-know paragraph--view-mode--default gtk">
                                    <div class='row col-md-12 good-to-know'>
                                      <div class='gtk-icn-img col-md-6'>
                                        <div class="field field--name-field-icon-image field--type-image field--label-hidden field--item">
                                          <img loading="lazy" src="../../assets/images/icon-download-resources_04819.png?itok=azvo10Fi" width="53" height="53" alt="" typeof="foaf:Image" class="img-responsive" />
                                        </div>
                                        <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_diagnosing_booklet;?></div>
                                      </div>
                                      <div class='gtk-desc col-md-12'>
                                        <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                                          <p><?=L::page_patient_diagnosing_bookletAlt;?></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="field--item">
                                  <div class="paragraph paragraph--type--download-link-para paragraph--view-mode--default custom-download-link-para">
                                    <div class='download-link'>
                                    <?php 
                                      if ($language == 'et') { 
                                        echo "<a href='../../assets/images/connect-the-swells-campaign---patient-brochure.pdf' target='_blank'>";
                                      } else {
                                        echo "<a href='../../assets/images/19-takhgl-0515 knowhae doctordiscussionguide l02 ru  Est adaptation.pdf' target='_blank'>";
                                      } ?>
                                        <div class="field field--name-field-title field--type-string field--label-hidden field--item"><?=L::page_patient_diagnosing_download;?></div>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
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
              <div class="view view-next-page view-id-next_page view-display-id-block_1 js-view-dom-id-74b07036322389f7a63f0d0a9c3381f6f4be92b27578438cca1a982f42dad735">
                <div class="view-content">
                  <div class="views-row">
                    <div class="views-field views-field-field-next-page">
                      <div class="field-content">
                        <a href="<?=$site_url;?>patsient/mis-on-hae/hae-ravimine"><?=L::page_patient_diagnosing_HAEtreated;?></a>
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