##Usage

Return to [Index](./index.md)

There are only 2 endpoints that are currently implemented for the Conductor Service that map to the API endpoints that can be found in http://developers.formstack.com/

---

###Controller Inclusion

To be able to use the Conductor Service from within you controller, you can use it as follows:

```php
// src/AppBundle/Controller/DefaultController

<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $conductor = $this->get('t73_biz_form_conductor.conductor');

        $form = $conductor->getForm(1234);

        return $this->render(
            'default/index.html.twig',
            [
                'formstack' => $form->javascript
            ]
        );
    }
}

```

In this example, we are using the Conductor::getForm($id) method to retrieve form 1234 and pass that variable to the rendered view. The data that is returned from the method has been json_decoded from within the Conductor Service. From this point we are then passing in the javascript property of the form object.

One thing to note, is that when passing in the javascript and html properties, Symfony will escape the data by default. In order to use these within your twig template, you should apply a raw filter to them like so.

```
{{ formstack|raw }}

```

##Method Documentation

###Conductor::getForms()

This function will return all of the available forms that are attached to your account.

###Conductor::getForm($id)

This function will return a specific form that is stored in your account.


Return to [Index](./index.md)