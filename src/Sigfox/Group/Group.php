<?php

namespace Sigfox\Group;


use Sigfox\AbstractSigfox;

/**
 * Class representing Group
 *
 * To see which optional parameters are available for methods, please see
 * official Sigfox Backend API documentation at https://resources.sigfox.com/document/backend-api-documentation
 *
 * @package Sigfox\Group
 */
class Group extends AbstractSigfox
{
    public function __construct($user, $password)
    {
        parent::__construct($user, $password);

        return $this;
    }


    /**
     * Lists all children groups of your group.
     *
     * @param array $params Optional parameters, if applicable
     * @return string Response in JSON format
     */
    public function listGroups(array $params = array())
    {
        $path = '/api/groups';
        $this->makeGetRequest($path);

        return $this->response;
    }

    /**
     * Get the description of a particular group
     *
     * @param string $groupId the group identifier as returned by the /api/groups endpoint.
     * @return string Response in JSON format

     */
    public function info(string $groupId)
    {
        if ($groupId == "" || $groupId == null) {
            throw new \InvalidArgumentException("You have to provide ID of the group.");
        }
        $path = '/api/groups/' . $groupId;
        $this->makeGetRequest($path);

        return $this->response;
    }

}