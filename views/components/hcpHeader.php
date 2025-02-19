<header class="navbar navbar-default container" id="navbar" role="banner">
        <div class="navbar-header">
          <div class="region region-navigation">
            <div class="knowhae-logo">
              <a class="logo navbar-btn pull-left" href="/" title="Home" rel="home">
                <img src="<?=$site_url;?>assets/images/logo.svg" alt="Home" />
              </a>
            </div>
            <div class="knowhae-nav-menus">
              <div class="knowhae-homepage-menu"></div>
              <div class="knowhae-hcp-menu">
                <nav role="navigation" aria-labelledby="block-hcpmenu-menu" id="block-hcpmenu">
                  <h2 class="visually-hidden" id="block-hcpmenu-menu"><?=L::page_navbar_hcp_dropdown_title;?></h2>
                  <ul class="menu menu--hcp-menu nav">
                    <li class="menu-icon menu-icon-5 expanded dropdown first">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-drupal-link-system-path="node/14"><?=L::page_navbar_hcp_dropdown_identifying_title;?> <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="menu-icon menu-icon-33 first">
                          <a href="<?=$site_url;?><?=L::page_navbar_hcp_dropdown_identifying_symptomsA;?>" data-drupal-link-system-path="node/14"><?=L::page_navbar_hcp_dropdown_identifying_symptoms;?></a>
                        </li>
                        <li class="menu-icon menu-icon-34">
                          <a href="<?=$site_url;?><?=L::page_navbar_hcp_dropdown_identifying_diagnosingA;?>" data-drupal-link-system-path="node/15"><?=L::page_navbar_hcp_dropdown_identifying_diagnosing;?></a>
                        </li>
                        <li class="menu-icon menu-icon-35 last">
                          <a href="<?=$site_url;?><?=L::page_navbar_hcp_dropdown_identifying_treatingA;?>" data-drupal-link-system-path="node/16"><?=L::page_navbar_hcp_dropdown_identifying_treating;?></a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-icon menu-icon-6 expanded dropdown active active-trail">
                      <a href="#" class="dropdown-toggle active-trail is-active" data-toggle="dropdown" data-drupal-link-system-path="node/17"><?=L::page_navbar_hcp_dropdown_impact_title;?> <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li class="menu-icon menu-icon-36 first">
                          <a href="<?=$site_url;?><?=L::page_navbar_hcp_dropdown_impact_burdenA;?>" data-drupal-link-system-path="node/17" class="is-active"><?=L::page_navbar_hcp_dropdown_impact_burden;?></a>
                        </li>
                        <li class="menu-icon menu-icon-37">
                          <a href="<?=$site_url;?><?=L::page_navbar_hcp_dropdown_impact_patientsA;?>" data-drupal-link-system-path="node/18"><?=L::page_navbar_hcp_dropdown_impact_patients;?></a>
                        </li>
                        <li class="menu-icon menu-icon-38 last">
                          <a href="<?=$site_url;?><?=L::page_navbar_hcp_dropdown_impact_managingA;?>" data-drupal-link-system-path="node/19"><?=L::page_navbar_hcp_dropdown_impact_managing;?></a>
                        </li>
                      </ul>
                    </li>
                    <li class="menu-icon menu-icon-66 last">
                      <a href="https://www.takeda.com/et-ee/kontaktid" data-drupal-link-system-path="node/21"><?=$site_url;?><?=L::page_navbar_hcp_contact;?></a>
                    </li>
                  </ul>
                </nav>
              </div>
              <div class="knowhae-patient-menu"></div>
            </div>
            <div class="knowhae-utility-social-lang-menus">
              <div class="knowhae-hcputility-menu">
                <nav role="navigation" aria-labelledby="block-hcputilitymenu-menu" id="block-hcputilitymenu">
                  <h2 class="visually-hidden" id="block-hcputilitymenu-menu"><?=L::page_navbar_hcp_utilityMenu;?></h2>
                  <ul class="menu menu--hcp-utility-menu nav">
                    <li class="menu-icon menu-icon-13 first last">
                      <a href="<?=$site_url;?>patsient/mis-on-hae/nahud-sumptomid-ja-pohjused" data-drupal-link-system-path="node/7"><?=L::page_navbar_hcp_prof;?></a>
                    </li>
                  </ul>
                </nav>
              </div>
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
