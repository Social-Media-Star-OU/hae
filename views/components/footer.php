<footer class="footer container" role="contentinfo">
          <div class="region region-footer">
            <section id="block-footerwebsiteparablock" class="block block-block-content block-block-contenta3111b0b-098b-410b-8bda-79a2ae0e298c clearfix">
              <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
                <h5>
                  <strong>
                    <?=L::page_footer_outside;?>
                  </strong>
                </h5>
              </div> 
            </section>
            <?php require "references.php"; ?>
            <section class="views-element-container block block-views block-views-blockreferences-block-block-1 clearfix" id="block-views-block-references-block-block-1">
              <div class="form-group">
                <div class="view view-references-block view-id-references_block view-display-id-block_1 js-view-dom-id-2608269ed089f42c94db4bdfffe3b93565c92859b709785478934ec9a926cc9f">
                </div>
              </div>
            </section>
            <nav role="navigation" aria-labelledby="block-knowhae-footer-menu" id="block-knowhae-footer"> 
              <h2 class="visually-hidden" id="block-knowhae-footer-menu">
                <?=L::page_footer_footerMenu;?>
              </h2>
              <div class="col-md-10"></div>              
              <div class="col-md-2">
                  <?php 
                    if ($language == 'et') { 
                      $urlEnd = 'et-ee';
                    } else 
                    if ($language == 'ru') {
                      $urlEnd = 'ru-ru';
                    } else {
                      $urlEnd = 'en-en';
                    }
                    ?>
                  <a href="https://www.takeda.com/<?=$urlEnd?>/" target="_blank">
                  <img src="<?=$site_url;?>assets/images/logo-takeda.svg" alt="Takeda logo">
                </a>
              </div>
              <ul class="menu menu--footer nav">
                <li class="menu-icon menu-icon-1 first">
                  <a href="<?=$site_url;?>utility/site-map" data-drupal-link-system-path="node/20">
                    <?=L::page_footer_sitemap;?>
                  </a>
                </li>
                <li class="menu-icon menu-icon-2">
                  <a href="https://www.takeda.com/et-ee/Takeda-privaatsusteatis" target="_blank">
                    <?=L::page_footer_privacy;?>
                  </a>
                </li>
                <li class="menu-icon menu-icon-3">
                  <a href="https://www.takeda.com/terms-and-conditions/">
                    <?=L::page_footer_legal;?>
                  </a>
                </li>
                <li class="menu-icon menu-icon-4 last">
                  <a href="https://www.takeda.com/et-ee/kontaktid">
                      <?=L::page_footer_contact;?>
                  </a>
                </li>
              </ul>
            </nav>
            <section id="block-footerpara" class="block block-block-content block-block-content526b59fa-ada7-417a-9693-a2fd1a687a15 clearfix">
              <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
                <p><?=L::page_footer_copy1;?></p>
                <p><?=L::page_footer_copy2;?></p>
              </div>
            </section>
          </div>
        </footer>
        <div class="cookies-block container">
          <div class="region region-cookies-block">
            <section id="block-cookiefloatingblock" class="block block-block-content block-block-contentcbda2137-b9fc-425a-bb5b-317f673e4c2d clearfix">
              <div class="field field--name-body field--type-text-with-summary field--label-hidden field--item">
                <div class="cookie-para">
                  <p>
                    <?=L::page_footer_cookieTitle;?>
                    <a class="open-cookies-popup" href="https://www.takeda.com/cookie-policy/">
                        <?=L::page_footer_cookieFind;?> <img src="<?=$site_url;?>assets/images/arrow-red.svg">
                    </a>
                  </p>
                  <div class="cookie-close-btn">
                    <a>
                      <span class="btn">x</span>
                    </a>
                  </div>
                  <a> </a>
                </div>
              </div>
            </section>
          </div>
        </div>
