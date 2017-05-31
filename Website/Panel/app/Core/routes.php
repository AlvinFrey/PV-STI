<?php

	use Core\Router;
	use Helpers\Hooks;

	//PARTIE UTILISATEUR

	Router::any('/', 'Controllers\Pages@index');
	Router::any('/home', 'Controllers\Pages@index');

	Router::any('/battery', 'Controllers\Battery@index');
	Router::any('/battery/weeklyBatteryPercentage', 'Controllers\Battery@weeklyBatteryPercentage');
	
	Router::any('/photovoltaic', 'Controllers\Photovoltaic@index');
	Router::any('/photovoltaic/weeklyPhotovoltaicProduction', 'Controllers\Photovoltaic@weeklyPhotovoltaicProduction');
	Router::any('/photovoltaic/weeklyHomeConsumption', 'Controllers\Photovoltaic@weeklyHomeConsumption');
	
	Router::any('/consumption', 'Controllers\Consumption@index');
	Router::any('/consumption/weeklyHomeConsumption', 'Controllers\Consumption@weeklyHomeConsumption');
	
	Router::any('/historic', 'Controllers\Historic@index');
	Router::any('/historic/searchSend', 'Controllers\Historic@searchSend');

	//PARTIE ADMINISTRATION / SERVEUR / SCRIPTS

	Router::any('/api/dataParser', 'Controllers\Api@dataParser');

	Router::any('/scripts/saveDailyBatteryPercentage', 'Controllers\Scripts@saveDailyBatteryPercentage');
	Router::any('/scripts/saveDailyConsumption', 'Controllers\Scripts@saveDailyConsumption');
	Router::any('/scripts/saveDailyProduction', 'Controllers\Scripts@saveDailyProduction');
	Router::any('/scripts/computeEfficiency', 'Controllers\Scripts@computeEfficiency');

	Router::any('/alerts', 'Controllers\Alerts@problemFinder');

	$hooks = Hooks::get();
	$hooks->run('routes');

	Router::$fallback = false;

	Router::dispatch();

?>
