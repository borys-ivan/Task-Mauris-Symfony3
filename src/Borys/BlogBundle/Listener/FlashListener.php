<?php

namespace Borys\BlogBundle\Listener;

use Borys\BlogBundle\BorysBlogEvent;
use Borys\BlogBundle\Event\PostEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Session\Session;

//class FlashListener implements EventSubscriberInterface
class FlashListener
{
    private $session;

    /**
     * FlashListener constructor.
     * @param $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }


//    public static function getSubscribedEvents()
//    {
//        return [
//            BorysBlogEvent::POST_CREATED=>'onFlash'
//        ];
//    }

    public function onFlash(PostEvent $e){
        //dump($e);
        //die;
        $post=$e->getPost();

        $this->session->getFlashBag()->add(
            'success',
            sprintf('Запись "%s" успешно добавлена ',$post->getTitle())

        );

    }

}