<?php
/**
 * Created by PhpStorm.
 * User: berkas1
 * Date: 20.8.17
 * Time: 23:57
 */

namespace Sigfox\DeviceType;


use Sigfox\AbstractSigfox;

/**
 * Class representing Device Type
 *
 * To see which optional parameters are available for methods, please see
 * official Sigfox Backend API documentation at https://resources.sigfox.com/document/backend-api-documentation
 *
 * @package Sigfox\DeviceType
 */
class DeviceType extends AbstractSigfox
{
    private $deviteTypeId;

    public function __construct($user, $password, $deviceTypeId = null)
    {
        parent::__construct($user, $password);
        $this->deviteTypeId = $deviceTypeId;

        return $this;
    }

    /**
     * Lists all device types available to your group.
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function listTypes(array $params = array()) {
        $path = '/api/devicetypes';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }

    /**
     * Get the description of a particular device type
     *
     * @return string Response in JSON format
     */
    public function info() {
        $path = '/api/devicetypes/' . $this->deviteTypeId;
        $this->makeGetRequest($path);

        return $this->response;
    }


    /**
     * Edit a device type
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function edit(array $params = array())
    {
        $path = '/api/devicetypes/edit';
        $this->makePostRequest($path, $params);

        return $this->response;
    }

    /**
     * Create a callback
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function createCallback(array $params = array())
    {
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/callbacks/new';
        $this->makePostRequest($path, $params);

        return $this->response;
    }


    /**
     * List the callbacks for a device type
     *
     * @return string Response in JSON format
     */
    public function listCallback()
    {
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/callbacks';
        $this->makePostRequest($path);

        return $this->response;
    }

    /**
     * Delete a callback
     *
     * @param string $callbackId callback ID
     * @return string Response in JSON format
     */
    public function deleteCallback(string $callbackId)
    {
        if ($callbackId === "") {
            throw new \InvalidArgumentException("You have to provide ID of the callback.");
        }
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/callbacks/' . $callbackId . '/delete';
        $this->makePostRequest($path);

        return $this->response;
    }

    /**
     * Enable callback
     *
     * @param string $callbackId callback ID
     * @return string Response in JSON format
     */
    public function enableCallback(string $callbackId)
    {
        if ($callbackId === "") {
            throw new \InvalidArgumentException("You have to provide ID of the callback.");
        }
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/callbacks/' . $callbackId . '/enable?enabled=true';
        $this->makePostRequest($path);

        return $this->response;
    }

    /**
     * Disable callback
     *
     * @param string $callbackId callback ID
     * @return string Response in JSON format
     */
    public function disableCallback(string $callbackId)
    {
        if ($callbackId === "") {
            throw new \InvalidArgumentException("You have to provide ID of the callback.");
        }
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/callbacks/' . $callbackId . '/enable?enabled=false';
        $this->makePostRequest($path);

        return $this->response;
    }

    /**
     * Select a downlink callback
     *
     * @param string $callbackId callback ID
     * @return string Response in JSON format
     */
    public function selectDownlinkCallback(string $callbackId)
    {
        if ($callbackId === "") {
            throw new \InvalidArgumentException("You have to provide ID of the callback.");
        }
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/callbacks/' . $callbackId . '/downlink';
        $this->makePostRequest($path);

        return $this->response;
    }


    /**
     * Get the communication down events that were sent for a list of devices belonging to the same device type,
     * in reverse chronological order (most recent events first).
     *
     * @return string Response in JSON format
     */
    public function errorEvents()
    {
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/status/error';
        $this->makeGetRequest($path);

        return $this->response;
    }


    /**
     * Get the network issues events that were sent for a list of devices belonging to the same device type,
     * in reverse chronological order (most recent events first).
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function warningEvents(array $params)
    {
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/status/warn';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }


    /**
     * Get the list of the custom geoloc configurations available for the given group
     *
     * @param string $groupId id of the given group
     * @return string Response in JSON format
     */
    public function listGeologConfigs(string $groupId)
    {
        if ($groupId === "") {
            throw new \InvalidArgumentException("You have to provide ID of the group");
        }

        $params = array('groupId' => $groupId);
        $path = '/api/devicetypes/geolocs-config';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }


    /**
     * Get the messages that were sent by all the devices of a device type,
     * in reverse chronological order (most recent messages first).
     * All device messages are listed, including those from device are not associated to this device type anymore.
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function messagesSent(array $params = array())
    {
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/messages';
        $this->makeGetRequest($path, $params);

        return $this->response;
    }


    /**
     * Disengage sequence number check for next message of each device of the device type.
     *
     * @return string Response in JSON format
     */
    public function disengageSequenceNumber()
    {
        $path = '/api/devicetypes/' . $this->deviteTypeId . '/disengage';
        $this->makeGetRequest($path);

        return $this->response;
    }

}
