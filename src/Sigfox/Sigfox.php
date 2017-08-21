<?php

namespace Sigfox;


/**
 * Main class allowing to manage your Sigfox devices and settings over Sigfox Backend API.
 *
 * To see which optional parameters are available for particular methods, please see
 * official API documentation (https://resources.sigfox.com/document/backend-api-documentation)
 * and provide these parameters in form of array.
 *
 * If you encounter any problem, please create an issue on Github.
 * https://github.com/berkas1/sigfox_php
 *
 * @author Simon Berka <berka@berkasimon.com>
 * @package Sigfox
 */
class Sigfox {
    private $user = "";
    private $password = "";


    /**
     * Sigfox constructor.
     * @param string $user Login key (NOT a backend username!)
     * @param string $password API password (NOT a backend password!)
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;


        return $this;
    }


    /**
     * Create new Device object
     *
     * @param string $deviceId ID of the device you want to work with
     * @return Device\Device
     */
    public function device(string $deviceId)
    {
        return new Device\Device($this->user, $this->password, $deviceId);
    }

    /**
     * Create new DeviceType object
     *
     * @param string $devideTypeId ID of the device type you want to work with
     * @return DeviceType\DeviceType
     */
    public function deviceType(string $devideTypeId)
    {
        return new DeviceType\DeviceType($this->user, $this->password, $devideTypeId);
    }

    /**
     * Create new Group object
     *
     * @return Group\Group
     */
    public function group()
    {
        return new Group\Group($this->user, $this->password);
    }

    /**
     * Get user saved during object construct
     * @return string User ID
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * Set another User/Login ID
     * @param string $user
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * Get API password saved during construct
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set another API password
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }


}
