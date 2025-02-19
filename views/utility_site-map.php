<!DOCTYPE html>
<html lang="et">
  <head>
    <title><?=L::page_utility_sitemap_title;?></title>
    <?php require "components/head.php"; ?>
  </head>
  <body class="node-20 node-en path-node page-node-type-page has-glyphicons">
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
      <?php require "components/utilityHeader.php"; ?>
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
                <span property="schema:name"><?=L::page_utility_sitemap_h1;?></span>
              </h1>
              <article data-history-node-id="20" role="article" about="<?=$site_url;?>utility/site-map" typeof="schema:WebPage" class="page full clearfix">
                <span property="schema:name" content="site map" class="hidden"></span>
                <div class="content"></div>
              </article>
              <nav role="navigation" aria-labelledby="block-sitemap-menu" id="block-sitemap">
                <h2 class="visually-hidden" id="block-sitemap-menu"><?=L::page_utility_sitemap_h2;?></h2>
                <ul>
                  <li class="menu-icon menu-icon-41">
                    <a href="/" data-drupal-link-system-path="&lt;front&gt;"><?=L::page_utility_sitemap_nav_li1;?></a>
                  </li>
                  <li class="menu-icon menu-icon-42">
                    <a href="<?=$site_url;?>patsient/mis-on-hae/nahud-sumptomid-ja-pohjused" data-drupal-link-system-path="node/7"><?=L::page_utility_sitemap_nav_li2_title;?></a>
                    <ul>
                      <li class="menu-icon menu-icon-43">
                        <a href="<?=$site_url;?>patsient/mis-on-hae/nahud-sumptomid-ja-pohjused" data-drupal-link-system-path="node/7"><?=L::page_utility_sitemap_nav_li2_li1;?></a>
                      </li>
                      <li class="menu-icon menu-icon-47">
                        <a href="<?=$site_url;?>patsient/mis-on-hae/hae-diagnoosimine" data-drupal-link-system-path="node/8"><?=L::page_utility_sitemap_nav_li2_li2;?></a>
                      </li>
                      <li class="menu-icon menu-icon-48">
                        <a href="<?=$site_url;?>patsient/mis-on-hae/hae-ravimine" data-drupal-link-system-path="node/9"><?=L::page_utility_sitemap_nav_li2_li3;?></a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-icon menu-icon-44">
                    <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-moju" data-drupal-link-system-path="node/10"><?=L::page_utility_sitemap_nav_li3_title;?></a>
                    <ul>
                      <li class="menu-icon menu-icon-45">
                        <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-moju" data-drupal-link-system-path="node/10"><?=L::page_utility_sitemap_nav_li3_li1;?></a>
                      </li>
                      <li class="menu-icon menu-icon-49">
                        <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-ja-perekond" data-drupal-link-system-path="node/11"><?=L::page_utility_sitemap_nav_li3_li2;?></a>
                      </li>
                      <li class="menu-icon menu-icon-50">
                        <a href="<?=$site_url;?>patsient/hae-ga-elamine/hae-tugi" data-drupal-link-system-path="node/12"><?=L::page_utility_sitemap_nav_li3_li3;?></a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-icon menu-icon-46">
                    <span><?=L::page_utility_sitemap_nav_li4;?></span>
                  </li>
                  <li class="menu-icon menu-icon-51">
                    <a href="<?=$site_url;?>hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused"><?=L::page_utility_sitemap_nav_li5_title;?></a>
                    <ul>
                      <li class="menu-icon menu-icon-52">
                        <a href="<?=$site_url;?>hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused"><?=L::page_utility_sitemap_nav_li5_li1;?></a>
                      </li>
                      <li class="menu-icon menu-icon-53">
                        <a href="<?=$site_url;?>hcp/hae-tuvastamine/hae-diagnoosimine"><?=L::page_utility_sitemap_nav_li5_li2;?></a>
                      </li>
                      <li class="menu-icon menu-icon-54">
                        <a href="<?=$site_url;?>hcp/hae-tuvastamine/hae-ravimine"><?=L::page_utility_sitemap_nav_li5_li3;?></a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-icon menu-icon-55">
                    <a href="<?=$site_url;?>hcp/hae-moju/hae-haiguskoormus"><?=L::page_utility_sitemap_nav_li6_title;?></a>
                    <ul>
                      <li class="menu-icon menu-icon-56">
                        <a href="<?=$site_url;?>hcp/hae-moju/hae-haiguskoormus"><?=L::page_utility_sitemap_nav_li6_li1;?></a>
                      </li>
                      <li class="menu-icon menu-icon-57">
                        <a href="<?=$site_url;?>hcp/hae-moju/patsientidega-vestlemine"><?=L::page_utility_sitemap_nav_li6_li2;?></a>
                      </li>
                      <li class="menu-icon menu-icon-58">
                        <a href="<?=$site_url;?>hcp/hae-moju/hae-ravimine"><?=L::page_utility_sitemap_nav_li6_li3;?></a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-icon menu-icon-61">
                    <a href="https://www.takeda.com/et-ee/kontaktid" data-drupal-link-system-path="node/21"><?=L::page_utility_sitemap_nav_li7;?></a>
                  </li>
                  <li class="menu-icon menu-icon-59">
                    <a href="https://www.takeda.com/et-ee/Takeda-privaatsusteatis"><?=L::page_utility_sitemap_nav_li8;?></a>
                  </li>
                  <li class="menu-icon menu-icon-60">
                    <a href="https://www.takeda.com/terms-and-conditions/" data-drupal-link-system-path="node/1"><?=L::page_utility_sitemap_nav_li9;?></a>
                  </li>
                </ul>
              </nav>
            </div>
          </section>
        </div>
      </div>
      <?php require "components/footer.php"; ?>
    </div>
    <?php require "components/javascript.php"; ?>
  </body>
</html>