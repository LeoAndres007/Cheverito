<?php
/*
 * @name: Búsqueda en google
 * @desc: Agrega un comando para realizar busquedas en google
 * @ver: 1.0
 * @author: Leo007
 * @id: google
 * @key: polsakerrulz
 *
 */

class polsakerrulz{
	public function __construct(&$core){
		$core->registerCommand("google", "google", "Realiza una búsqueda en google. Sintaxis: google <texto de la busqueda>");
	}
	
	public function google(&$irc, &$data, &$core){
			$ts=$core->jparam($data->messageex,1);
			$gap=file_get_contents("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&%s".$core->conf['m_google']['api_key']."&cx=001206920739550302428:fozo2qblwzc&q=".urlencode($ts)."&alt=json");
			$jao=json_decode($gap);
			$resp="Resultados de la búsqueda en Google de \"".$ts."\": ".$jao->items[0]->title." 10".$jao->items[0]->link." ".$jao->items[1]->title." 10".$jao->items[1]->link." ".$jao->items[2]->title." 10".$jao->items[2]->link."";
			$irc->message(SMARTIRC_TYPE_CHANNEL, $data->channel, $resp);
	}	
}
