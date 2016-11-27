<?php

namespace Affect\MiniWebBundle\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

abstract class MController extends BaseController
{
    /**
     * @param  string $name
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository($name)
    {
        return $this->getDoctrine()->getRepository('Affect\\MiniCoreBundle\\Entity\\' . $name);
    }

    /**
     * @return ObjectManager
     */
    protected function getManager()
    {
        return $this->getDoctrine()->getManager();
    }

    protected function dispatchEvent($name, $event)
    {
        $this->get('event_dispatcher')->dispatch($name, $event);
    }

    protected function getSecurityContext()
    {
        return $this->get('security.context');
    }

    /**
     * @param string $role
     */
    protected function isGranted($role, $object = null)
    {
        return $this->getSecurityContext()->isGranted($role, $object);
    }

    protected function getSession()
    {
        return $this->getRequest()->getSession();
    }

    protected function getClassName($class)
    {
        $ref = new \ReflectionClass(get_class($class));

        return $ref->getShortName();
    }

    protected function getFlashBag()
    {
        return $this->getSession()->getFlashBag();
    }

    protected function setSuccessFlash($message)
    {
        $this->getFlashBag()->add('success', $message);
    }

    protected function setErrorFlash($message)
    {
        $this->getFlashBag()->add('error', $message);
    }

    protected function setNoticeFlash($message)
    {
        $this->getFlashBag()->add('notice', $message);
    }

    protected function setCustomFlash($type, $message)
    {
        $this->getFlashBag()->add($type, $message);
    }


    protected function getUserManager()
    {
        return $this->get('fos_user.user_manager');
    }

    protected function getExcelExportService(){
        return $this->get('miniwp.excel.export');
    }
}
