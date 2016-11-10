from eve.auth import BasicAuth

class FontysAuth(BasicAuth):
    def check_auth(self, username, password, allowed_roles, resource, method):
        #TODO: Maybe implement fontys api to only accept fontys users that are in a class name "DELTA"
        return username == 'admin' and password == 'secret'