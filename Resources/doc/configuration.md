##Configuration

Return to [Index](./index.md)

Add in the configuration for the bundle in the app/config/config.yml file.

```yml

# app/config/config.yml
# ...

t73_biz_form_conductor:
    access_token: someSecretAccessToken
    base_uri: "https://www.formstack.com/api/v2"
```

The access_token can be aquired by going to https://www.formstack.com/admin/apiKey/main and creating a new application instance. The base_uri is set to the current version of the api. this can be easily changed in the future as the need arises.

Now you can read about the [usage](./usage.md) of the service.

Return to [Index](./index.md)