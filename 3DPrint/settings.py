import os

#Mongo Setup, so:
if os.environ.get('PORT'):
    #TODO: Replace with remote zooi
    MONGO_HOST = ''
    MONGO_PORT = 10047
    MONGO_USERNAME = '<user>'
    MONGO_PASSWORD = '<pw>'
    MONGO_DBNAME = '<dbname>'

#Domain Specification
DOMAIN = {
    'printer': {
        'schema': {
            'id': {
                'type' : 'string',
                'minlength' : 1,
                'required' : True
            }
        }
    }
}

RESOURCE_METHODS = ['GET', 'POST']