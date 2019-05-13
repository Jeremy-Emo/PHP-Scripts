<?php

//Supprime un paramètre d'url
function delete_url_params($key, $url){
  return substr(preg_replace('/(.*)([?|&])' . $key . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&'), 0, -1);
}
