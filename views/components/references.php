<?php 
switch ($uri) {
    case "/patsient/mis-on-hae/nahud-sumptomid-ja-pohjused":
        echo L::page_footer_ref_patient_symptoms;
    break;
    case "/patsient/mis-on-hae/hae-diagnoosimine":
        echo L::page_footer_ref_patient_diagnosing;
    break;
    case "/patsient/mis-on-hae/hae-ravimine":
        echo L::page_footer_ref_patient_treating;
    break;
    case "/patsient/hae-ga-elamine/hae-moju":
        echo L::page_footer_ref_patient_impact;
    break;
    case "/patsient/hae-ga-elamine/hae-ja-perekond":
        echo L::page_footer_ref_patient_hae;
    break;
    case "/patsient/hae-ga-elamine/hae-tugi":
        echo L::page_footer_ref_patient_support;
    break;
    case "/hcp/hae-tuvastamine/nahud-sumptomid-ja-pohjused":
        echo L::page_footer_ref_hcp_symptoms;
    break;
    case "/hcp/hae-tuvastamine/hae-diagnoosimine":
        echo L::page_footer_ref_hcp_diagnosing;
    break;
    case "/hcp/hae-tuvastamine/hae-ravimine":
        echo L::page_footer_ref_hcp_treating;
    break;
    case "/hcp/hae-moju/hae-haiguskoormus":
        echo L::page_footer_ref_hcp_burden;
    break;
    case "/hcp/hae-moju/patsientidega-vestlemine":
        echo L::page_footer_ref_hcp_talking;
    break;
    case "/hcp/hae-moju/hae-ravimine":
        echo L::page_footer_ref_hcp_managing;
    break;
    case "/utility/site-map":
        echo L::page_footer_ref_sitemap;
    break;
    case "/":
        echo L::page_footer_ref_home;
    break;
  }

?>