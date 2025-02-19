<!DOCTYPE html>
<html lang="et"> 
  <head>
    <title><?=L::page_index_title;?></title>
    <?php require "components/head.php"; ?>
  </head>
  <body class="node-4 node-en path-frontpage page-node-type-page has-glyphicons">
      <a href="#main-content" class="visually-hidden focusable skip-link">
      <?=L::page_dialog_skip;?>
      </a>
      <div class="dialog-off-canvas-main-canvas" data-off-canvas-main-canvas>
        <div class="Mobile-top-block container">
          <div class="region region-mobile-top-block">
            <section id="block-topblockformobileonly" class="for-mobile-only block block-block-content block-block-content9275e390-a9fa-4a90-a24f-efc7495c20f0 clearfix">
              <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item"><p><?=L::page_dialog_top;?></p></div>      
            </section>
          </div>
        </div>
        <header class="navbar navbar-default container" id="navbar" role="banner">
          <div class="navbar-header">
            <div class="region region-navigation">
              <div class="knowhae-logo">      
                <a class="logo navbar-btn pull-left" href="<?=$site_url;?>" title="Home" rel="home">
                  <img src="<?=$site_url;?>assets/images/logo.svg" alt="Home" />
                </a>
              </div>
              <div class="knowhae-nav-menus">
                <div class="knowhae-homepage-menu"></div>
                <div class="knowhae-hcp-menu"></div>
                <div class="knowhae-patient-menu"></div>
              </div>
              <div class="knowhae-utility-social-lang-menus">
                <div class="knowhae-hcputility-menu"></div>
                <div class="knowhae-patientutility-menu"></div>
                <div class="knowhae-sociallinks-menu"></div>
                <div class="knowhae-hcpsociallinks-menu"></div>
                <div class="knowhae-patientsociallinks-menu"></div>
                <div class="knowhae-enselectyourlanguage-menu"></div>
                <div class="button-lang-cls">
                  <div class="knowhae-english-lang"><?=L::page_navbar_hcp_language;?></div>
                  <div class="knowhae-languageswitcher-menu hidden">
                      <section class="language-switcher-language-url">
                          <ul class="links">
                              <li>Eesti</li>
                              <li>Russian</li>
                          </ul>
                      </section>
                  </div>
              </div>

              </div>
            </div>
            <div class="mobile-hamber-class">
              <div class="humbar-cls">
                <span class="humbar-first"></span>
                <span class="humbar-second"></span>
                <span class="humbar-third"></span>
              </div>
            </div>
          </div>
        </header>
        <div role="main" class="main-container container js-quickedit-main-content home-banner">
          <div class="row">
            <div class="col-sm-12" role="heading">
              <div class="region region-header">
                <section id="block-homepagecarouselblockandcards" class="block block-block-content block-block-contente0ed843f-db50-403d-9163-a146e8da2ee4 clearfix">
                  <div class="field field--name-field-block-content field--type-entity-reference-revisions field--label-hidden field--items">
                    <div class="field--item">    
                      <div class="paragraph paragraph--type--carousel paragraph--view-mode--default custom-carousel-paragraph">
    		                <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="4000">
		                      <div class="carousel-inner">
		                        <div class="item active">
			                        <img class="for-desktop"  src="<?=$site_url;?>assets/images/<?=$language;?>/desktop_1.webp" alt="img">
			                        <img class="for-mobile" src="<?=$site_url;?>assets/images/<?=$language;?>/mobile_1.webp" alt="img">
		                        </div>
		  		                  <div class="item">
			                        <img class="for-desktop" src="<?=$site_url;?>assets/images/<?=$language;?>/desktop_2.webp" alt="img">
			                        <img class="for-mobile" src="<?=$site_url;?>assets/images/<?=$language;?>/mobile_2.webp" alt="img">
		                        </div>
                                <div class="item">
			                      <img class="for-desktop" src="<?=$site_url;?>assets/images/<?=$language;?>/desktop_3.webp" alt="img">
			                      <img class="for-mobile" src="<?=$site_url;?>assets/images/<?=$language;?>/mobile_3.webp" alt="img">
		                        </div>
                            </div>
    		                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
		                      <span class="glyphicon glyphicon-chevron-left"></span>
		                      <span class="sr-only"><?=L::page_index_sliderPrevious;?></span>
		                    </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                <span class="sr-only"><?=L::page_index_sliderNext;?></span>
                            </a>
	                    </div>
	                  </div>
                  </div>
                  <div class="field--item">  
                    <div class="paragraph paragraph--type--cards-para paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6 patient">
                      <div class='card-block'>
                        <div class="card-title"></div>
                          <div class='col-md-3 card-block-left'>
                            <div class="card-link">
                              <h2>
                                <div class="field field--name-field-link field--type-link field--label-hidden field--item">
                                  <a href="<?=$site_url;?>patsient/mis-on-hae/nahud-sumptomid-ja-pohjused"> <?=L::page_index_WhatIsHAE;?></a>
                                </div>
                              </h2>
                            </div>
                            <div class="card-desc">
                              <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                                <p>
                                  <a href="<?=$site_url;?>patsient/mis-on-hae/nahud-sumptomid-ja-pohjused">
                                    <?=L::page_index_WhatIsHAEDesc;?>
                                    <sup>1</sup>
                                  </a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class='col-md-3 card-block-right'>
                            <div class="card-link">
                              <h2>
                                <div class="field field--name-field-link2 field--type-link field--label-hidden field--item">
                                  <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-moju">
                                    <?=L::page_index_LivingWithHAE;?>
                                  </a>
                                </div>
                              </h2>
                            </div>
                            <div class="card-desc">
                              <div class="field field--name-field-desc field--type-text-long field--label-hidden field--item">
                                <p>
                                  <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-moju">
                                    <?=L::page_index_LivingWithHAEDesc;?>
                                  </a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="field--item">  
                      <div class="paragraph paragraph--type--cards-para paragraph--view-mode--default col-xs-12 col-sm-12 col-md-6 col-lg-6 hcp">
                        <div class='card-block'>
                          <div class="card-title">
                            <div class="field field--name-field-title field--type-string field--label-hidden field--item">
                                <?=L::page_index_HealthCareProvider;?>
                            </div>
                          </div>
                          <div class='col-md-3 card-block-left open-identifying-hae-popup '>
                            <div class="card-link">
                              <h2>
                                <div class="field field--name-field-link field--type-link field--label-hidden field--item">
                                  <a href="<?=$site_url;?>hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused">
                                    <span><?=L::page_index_IdentifyingHAE;?></span>
                                  </a>
                                </div>
                              </h2>
                            </div>
                            <div class="card-desc">
                              <div class="field field--name-field-description field--type-text-long field--label-hidden field--item">
                                <p>
                                  <a href="<?=$site_url;?>hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused">
                                    <?=L::page_index_IdentifyingHAEDesc;?>
                                    <sup>2</sup>
                                  </a>
                                </p>
                              </div>
                            </div>
                          </div>
                          <div class='col-md-3 card-block-right open-managing-hae-popup'>
                            <div class="card-link">
                              <h2>
                                <div class="field field--name-field-link2 field--type-link field--label-hidden field--item">
                                  <a href="<?=$site_url;?>hcp/hae-moju/hae-ravimine">
                                    <?=L::page_index_ManagingHAE;?>
                                  </a>
                                </div>
                              </h2>
                            </div>
                            <div class="card-desc">
                              <div class="field field--name-field-desc field--type-text-long field--label-hidden field--item">
                                <p>
                                  <a>
                                    <?=L::page_index_ManagingHAEDesc;?>
                                  </a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
            </div>
            <section class="col-sm-12">
              <div class="highlighted cart-cls">  
                <div class="region region-highlighted">
                  <div data-drupal-messages-fallback class="hidden"></div>
                </div>
              </div>
              <a id="main-content"></a>
              <div class="region region-content">
                <article data-history-node-id="4" role="article" about="/home" typeof="schema:WebPage" class="page full clearfix">
                  <span property="schema:name" content="Home" class="hidden"></span>  
                  <div class="content">
                    <div property="schema:text" class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
                      <h1>Home</h1>
                    </div>      
                  </div>
                </article>
              </div>
            </section>
          </div>
        </div>
        <?php require "components/footer.php"; ?>
      </div>
      <?php require "components/javascript.php"; ?>
  </body>
</html>
