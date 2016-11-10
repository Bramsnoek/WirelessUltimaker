DOMAIN = {
    'printer': {
        'schema': {
            'id': {
                'type' : 'string',
                'minlength' : 1,
                'maxlength' : 50,
                'required' : True
            }
        }
    } 
}

RESOURCE_METHODS = ['GET', 'POST']