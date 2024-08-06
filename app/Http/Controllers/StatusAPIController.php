<?php

namespace App\Http\Controllers;


use App\Http\Controllers\AppBaseController;

/**
 * Class StatusAPIController
 */
class StatusAPIController extends AppBaseController
{
    const TRACKING_POSTED = 1;
    const TRACKING_MOVING = 2;
    const TRACKING_STOPPED = 3;
    const TRACKING_RECEIVED = 4;
    const TRACKING_ARRIVED = 5;
    const TRACKING_PROBLEM = 6;
    const TRACKING_PI_ABERTA = 7;
    const TRACKING_PI_INDENIZADA = 8;
    const TRACKING_PI_NAO_INDENIZADA = 9;
    const TRACKING_NOT_POSTED = 10;
    const TRACKING_WITHOUT_CATEGORY = 11;
    const TRACKING_NO_ENCONTRADO = 46;

    const CONTACT_UNVERIFIED = 1;
    const CONTACT_VERIFIED = 2;
    const CONTACT_MISSING = 7;

    const MESSAGE_CREATED = 1;
    const MESSAGE_SENDED = 2;
    const MESSAGE_FAIL = 3;
}
