<?php

namespace App\Services;

class SomethingService
{
 	public function isDeviceTypeChecked(string $devices, string $target) : bool
    {
        $explodedDevices = explode('+', $devices);
        foreach ($explodedDevices as $device) {
            if ($device === $target) {
                return true;
            }
        }

        return false;
    }
}
