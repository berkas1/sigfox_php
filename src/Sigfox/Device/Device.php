<?php
/**
 * Created by PhpStorm.
 * User: berkas1
 * Date: 20.8.17
 * Time: 22:52
 */

namespace Sigfox\Device;


use Sigfox\AbstractSigfox;


/**
 * Class representing one Device
 *
 * To see which optional parameters are available for methods, please see
 * official Sigfox Backend API documentation at https://resources.sigfox.com/document/backend-api-documentation
 *
 * @package Sigfox\Device
 */
class Device extends AbstractSigfox
{
    private $deviceId;

    public function __construct($user, $password, $deviceId)
    {
        parent::__construct($user, $password);
        $this->deviceId = $deviceId;

        return $this;
    }

    /**
     * Get information about a device.
     *
     * @return string Response in JSON format
     */
    public function info()
    {
        $path = '/api/devices/' . $this->deviceId;
        $this->makeGetRequest($path);

        return $this->response;

    }

    /**
     * Get information about a device’s token.
     *
     * @return string Response in JSON format
     */
    public function tokenState()
    {

        $path = '/api/devices/' . $this->deviceId . "/token-state";
        $this->makeGetRequest($path);

        return $this->response;
    }

    /**
     * Get the messages that were sent by a device, in reverse chronological order (most recent messages first).
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function messagesSent(array $params = array())
    {
        $path = '/api/devices/' . $this->deviceId . '/messages';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }

    /**
     * Get the messages location from the following sources: GPS data or the Sigfox Geolocation service
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function messagesLocation(array $params = array())
    {
        $path = '/api/devices/' . $this->deviceId . '/locations';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }

    /**
     * Get the communication down events that were sent for a device
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function errorStatusEvents(array $params = array())
    {
        $path = '/api/devices/' . $this->deviceId . '/status/error';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }

    /**
     * Get the network issues events that were sent for a device
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function warningStatusEvents(array $params = array())
    {
        $path = '/api/devices/' . $this->deviceId . '/status/warn';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }

    /**
     * Return the network status for a specific device.
     *
     * @return string Response in JSON format
     */
    public function networkStatus()
    {
        $path = '/api/devices/' . $this->deviceId . '/networkstate';
        $this->makeGetRequest($path);

        return $this->response;
    }

    /**
     * Returns the total number of device messages for one device
     *
     * @return string Response in JSON format
     */
    public function messageMetrics() {
        $path = '/api/devices/' . $this->deviceId . '/messages/metric';
        $this->makeGetRequest($path);

        return $this->response;
    }

    /**
     * Get a Device’s consumptions for a year
     *
     * @param int $year
     * @return string Response in JSON format
     */
    public function consumptions(int $year) {
        $path = '/api/devices/' . $this->deviceId . '/consumptions/' . $year;
        $this->makeGetRequest($path);

        return $this->response;
    }

    /**
     * Return Device ID
     * @return string device ID
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * Set new Device ID
     * @param string $deviceId new device ID
     */
    public function setDeviceId(string $deviceId)
    {
        $this->deviceId = $deviceId;
    }




}