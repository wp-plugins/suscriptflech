<?php

global $wpsf_settings;

// General Settings section
$wpsf_settings[] = array(
    'section_id' => 'general',
    'section_title' => '',
    'section_description' => '<br><br><span class="dashicons dashicons-admin-generic"></span> Configuración de los mensajes a mostrar y configuración widget',
    'section_order' => 5,
    'fields' => array(
        array(
            'id' => 'tamano_boton',
            'title' => 'Tamaño del boton del widget',
            'desc' => 'Pon el tamaño del boton del widget en %.',
            'type' => 'text',
            'std' => '100%'
        ),
        array(
            'id' => 'color_boton',
            'title' => 'Color del botón del widget',
            'desc' => 'Pon el color del botón del widget.',
            'type' => 'color',
            'std' => '#428bca'
        ),
        array(
            'id' => 'color_texto',
            'title' => 'Color del texto del widget',
            'desc' => 'Pon el color del texto del widget.',
            'type' => 'color',
            'std' => '#ffffff'
        ),
        array(
            'id' => 'border_boton',
            'title' => 'Borde del botón del widget',
            'desc' => 'Pon el radio del borde del botón en px.',
            'type' => 'text',
            'std' => '4px'
        ),
        array(
            'id' => 'tamano_input',
            'title' => 'Tamaño del input del widget',
            'desc' => 'Pon el tamaño del input del widget en %.',
            'type' => 'text',
            'std' => '100%'
        ),
        array(
            'id' => 'border_input',
            'title' => 'Borde del campo  del widget',
            'desc' => 'Pon el radio del borde del campo input en px.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'color_fondo',
            'title' => 'Color fondo input del widget',
            'desc' => 'Pon el color del fondo del input.',
            'type' => 'color',
            'std' => ''
        ),
         array(
            'id' => 'color_input_texto',
            'title' => 'Color texto del input del widget',
            'desc' => 'Pon el color del texto al escribir en el input.',
            'type' => 'color',
            'std' => ''
        ),
    	array(
            'id' => 'fallo_email',
            'title' => 'Email no válido',
            'desc' => 'Escriba el texto que aparecerá cuando no sea un email valido.',
            'type' => 'text',
            'std' => 'Tienes que escribir un email'
        ),
        array(
            'id' => 'existe_email',
            'title' => 'Email ya existe',
            'desc' => 'Escriba el texto cuando el email ya exista.',
            'type' => 'text',
            'std' => 'El email ya esta en uso'
        ),
        array(
            'id' => 'ok_email',
            'title' => 'Sucripto correctamente',
            'desc' => 'Escriba el texto que saldra cuando se haya suscrito correctamente.',
            'type' => 'textarea',
            'std' => 'Se ha enviado un mensaje de confirmación; por favor, haga clic en el enlace de confirmación para verificar su suscripción.'
        ),
         array(
            'id' => 'mensaje_suscript',
            'title' => 'Mensaje para aceptar la suscripción',
            'desc' => 'Escriba el texto que saldra cuando reciba el correo para aceptar la suscripción.',
            'type' => 'textarea',
            'std' => 'Se ha suscrito al Boletín de Noticias de nuestro sitio web, para activar su suscripción haga clic en el enlace de abajo:'
        ),/*
         array(
            'id' => 'color',
            'title' => 'Color',
            'desc' => 'This is a description.',
            'type' => 'color',
            'std' => '#ffffff'
        )
        array(
            'id' => 'select',
            'title' => 'Mi nombre del select',
            'desc' => 'Aqui la descripcion del select.',
            'type' => 'select',
            'std' => '-',
            'choices' => array(
                '-' => '-',
                'test1' => 'Test 1',
                'test2' => 'Test 2'
            )
        ),
        array(
            'id' => 'radio',
            'title' => 'Radio',
            'desc' => 'This is a description.',
            'type' => 'radio',
            'std' => 'green',
            'choices' => array(
                'red' => 'Red',
                'green' => 'Green',
                'blue' => 'Blue'
            )
        ),
        array(
            'id' => 'checkbox',
            'title' => 'Checkbox',
            'desc' => 'This is a description.',
            'type' => 'checkbox',
            'std' => 1
        ),
        array(
            'id' => 'checkboxes',
            'title' => 'Checkboxes',
            'desc' => 'This is a description.',
            'type' => 'checkboxes',
            'std' => array(
                'red',
                'blue'
            ),
            'choices' => array(
                'red' => 'Red',
                'green' => 'Green',
                'blue' => 'Blue'
            )
        ),
        array(
            'id' => 'color',
            'title' => 'Color',
            'desc' => 'This is a description.',
            'type' => 'color',
            'std' => '#ffffff'
        ),*/
        /*array(
            'id' => 'editor',
            'title' => 'Editor',
            'desc' => 'This is a description.',
            'type' => 'editor',
            'std' => ''
        )*/
    )
);

// More Settings section
$wpsf_settings[] = array(
    'section_id' => 'plantilla',
    'section_title' => '',
     'section_description' => '<br><br><span class="dashicons dashicons-admin-generic"></span> Configuración de la plantilla del email',
    'section_order' => 10,
    'fields' => array(
        array(
            'id' => 'logo_email',
            'title' => 'Pon tu logo aquí 80 X 80 px',
            'desc' => 'Logo para el envio del correo',
            'type' => 'file',
            'std' => ''
        ),
        
        array(
            'id' => 'color_plantilla',
            'title' => 'Seleccione un color',
            'desc' => 'Seleccione un color para la plantilla del email, por defecto es el gris.',
            'type' => 'select',
            'std' => 'gris',
            'choices' => array(
                'gris' => 'Gris',
                'rosa' => 'Rosa',
                'azul' => 'Azul',
                'verde' => 'Verde',
                'negro' => 'Negro',
                'amarillo' => 'Amarillo'
            )
        ),
        array(
            'id' => 'mostrar_imagen',
            'title' => 'Mostrar imágen en el correo',
            'desc' => 'Mostrar la imágen del post en la plantilla del email.',
            'type' => 'radio',
            'std' => 'si',
            'choices' => array(
                'si' => 'Si',
                'no' => 'No'
            )
        ),
        array(
            'id' => 'icono_facebook',
            'title' => 'Url facebook',
            'desc' => 'Escriba la url si tienes facebook.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_twetter',
            'title' => 'Url twitter',
            'desc' => 'Escriba la url si tienes twitter.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_google',
            'title' => 'Url google',
            'desc' => 'Escriba la url si tienes google.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_pinterest',
            'title' => 'Url pinterest',
            'desc' => 'Escriba la url si tienes pinterest.',
            'type' => 'text',
            'std' => ''
        ),
        array(
            'id' => 'icono_youtube',
            'title' => 'Url youtube',
            'desc' => 'Escriba la url si tienes youtube.',
            'type' => 'text',
            'std' => ''
        ),
    )
);

?>