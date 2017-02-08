<?php

namespace Revolve\SalesOpz\Contracts\Service\Zoom;

/**
 * Interacts with the Zoom Webinar API.
 *
 * Documentation: https://zoom.us/developer/overview/rest-webinar-api
 */
interface WebinarInterface
{
    // Currently these methods are in the same order as in the Zoom docs.
    // We will probably group them afterwards to be a bit more ordered & logical.

    public function createWebinar();

    public function deleteWebinar();

    public function listWebinar();

    public function listRegistrationWebinar();

    public function updateWebinar();

    public function endWebinar();

    public function getRegistrationWebinar();

    public function cancelRegistrationWebinar();

    public function getWebinarPanelist();

    public function getEndedWebinarUUID();

    public function listRegistrant();

    public function approveRegistrant();

    public function registerForWebinar();
}
