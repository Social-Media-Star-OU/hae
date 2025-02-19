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
              <div class="knowhae-hcp-menu"></div>
              <div class="knowhae-patient-menu">
                <nav role="navigation" aria-labelledby="block-patientmenu-menu" id="block-patientmenu">
                    <h2 class="visually-hidden" id="block-patientmenu-menu"><?=L::page_navbar_patient_dropdown_title;?></h2>
                    <ul class="menu menu--patient-menu nav">
                        <li class="menu-icon menu-icon-17 expanded dropdown <?php if (strpos($baseUrl, "what-is-hae") !== false) { echo "active active-trail first"; } ?>">
                            <a href="#" class="dropdown-toggle active-trail" data-toggle="dropdown" data-drupal-link-system-path="&lt;front&gt;"><?=L::page_navbar_patient_dropdown_WhatIsHAE_title;?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="menu-icon menu-icon-40 first">
                                <a href="<?=$site_url;?><?=L::page_navbar_patient_dropdown_WhatIsHAE_symptomsA;?>" data-drupal-link-system-path="node/7"><?=L::page_navbar_patient_dropdown_WhatIsHAE_symptoms;?></a>
                            </li>
                            <li class="menu-icon menu-icon-27 active active-trail">
                                <a href="<?=$site_url;?><?=L::page_navbar_patient_dropdown_WhatIsHAE_diagnosingA;?>" class="active-trail is-active" data-drupal-link-system-path="node/8"><?=L::page_navbar_patient_dropdown_WhatIsHAE_diagnosing;?></a>
                            </li>
                            <li class="menu-icon menu-icon-28 last">
                                <a href="<?=$site_url;?><?=L::page_navbar_patient_dropdown_WhatIsHAE_treatingA;?>" data-drupal-link-system-path="node/9"><?=L::page_navbar_patient_dropdown_WhatIsHAE_treating;?></a>
                            </li>
                            </ul>
                        </li>
                        <li class="menu-icon menu-icon-18 expanded dropdown <?php if (strpos($baseUrl, "living-with-hae") !== false) { echo "active active-trail first"; } ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-drupal-link-system-path="node/10"><?=L::page_navbar_patient_dropdown_LivingWithHAE_title;?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="menu-icon menu-icon-29 first">
                                <a href="<?=$site_url;?><?=L::page_navbar_patient_dropdown_LivingWithHAE_impactA;?>" data-drupal-link-system-path="node/10"><?=L::page_navbar_patient_dropdown_LivingWithHAE_impact;?></a>
                            </li>
                            <li class="menu-icon menu-icon-30">
                                <a href="<?=$site_url;?><?=L::page_navbar_patient_dropdown_LivingWithHAE_familyA;?>" data-drupal-link-system-path="node/11"><?=L::page_navbar_patient_dropdown_LivingWithHAE_family;?></a>
                            </li>
                            <li class="menu-icon menu-icon-31 last">
                                <a href="<?=$site_url;?><?=L::page_navbar_patient_dropdown_LivingWithHAE_supportA;?>" data-drupal-link-system-path="node/12"><?=L::page_navbar_patient_dropdown_LivingWithHAE_support;?></a>
                            </li>
                            </ul>
                        </li>
                        <li class="menu-icon menu-icon-63 last">
                            <a href="https://www.takeda.com/et-ee/kontaktid" data-drupal-link-system-path="node/21"><?=L::page_navbar_patient_contact;?></a>
                        </li>
                    </ul>
                </nav>
              </div>
            </div>
            <div class="knowhae-utility-social-lang-menus">
              <div class="knowhae-hcputility-menu"></div>
              <div class="knowhae-patientutility-menu">
                <nav role="navigation" aria-labelledby="block-patientutilitymenu-menu" id="block-patientutilitymenu">
                  <h2 class="visually-hidden" id="block-patientutilitymenu-menu"><?=L::page_navbar_patient_utilityMenu;?></h2>
                  <ul class="menu menu--patient-utility-menu nav">
                    <li class="menu-icon menu-icon-14 first last">
                      
                      <span onclick="window.location.href='<?=$site_url;?>hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused';" class="open-identifying-hae-popup navbar-text"><?=L::page_navbar_patient_prof;?></span>
                    </li>
                  </ul>
                </nav>
              </div>
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
