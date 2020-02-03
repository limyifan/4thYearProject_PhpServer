# Tripit Virtual Private Server
This repo contains the backend structure of my final year project Tripit. The code is written in PHP and makes use of several API's. I setup this server to be a RestfulAPI allowing any client to access the data via a simple HTTP request. 

I have setup this application on Amazon Web Services, making use of their Lighsail service which is Virtual Private Server instance (Amazon EC2) with pre installed stacks, in this case its LAMP for PHP. I also make use of AWS Route 53 for the DNS settings.

Please note, depending on time elapsed these URL's are likely to change / expire.

Please see a detailed journal of my work on this project here.
https://mahara.dkit.ie/view/view.php?t=JwiKOq7jlVHs18cdMSuN

The API URL.
https://201.team/

A sample of the response my server will give;
https://201.team/api/randomroute/getroute.php/?lat=54.004160&lng=-6.402970&pref1=Food&pref2=Sport&pref3=Entertainment


```
{
    "PlaceObject": [
        {
            "place_id": "ChIJ10mXAqfOYEgRLNAFN0GWq40",
            "place_name": "Panama Coffee",
            "place_type": "cafe",
            "rating": 4.6,
            "latitude": 54.00436389999999,
            "longitude": -6.403081299999998,
            "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/cafe-71.png",
            "open": "Closed",
            "cover_image": "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CmRaAAAA-iYVmLNPa_9Td5jwthABGG8KUsG3AXiAp7daHeUlLV9M-HNyFdr2ySHxglX9poNH4CBgG2slEjWDmT3rA4r9_-Pjc994T2SoDIXvWo2lXk_PVjW4N2RoAQx4qgo2bgBnEhDjBrh5pdRc7YK4QIWUV0ckGhQZ8D94bMxP_jXb5CYijeAnwldPSA&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw"
        },
        {
            "place_id": "ChIJAy1hA6fOYEgRmF6sJ9NV8hA",
            "place_name": "3rd Place Coffee House",
            "place_type": "cafe",
            "rating": 4.7,
            "latitude": 54.00397749999999,
            "longitude": -6.403468699999999,
            "icon": "https://maps.gstatic.com/mapfiles/place_api/icons/cafe-71.png",
            "open": "Open",
            "cover_image": "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CmRaAAAAj9cy9i8lOLzqQmDbcRL3bzYFsZnhnGedYHHVk8usyN9jNZQlOtajNjA8X7GgeS_cWKJBd_U6ayLxik8jT8jCYIXWOs4AvdQIHJmzEzngeBiHHtasDPgm0DI5OK2fTBMfEhCzBLRvaCZAFb0DcqbCqClqGhQmrOQNXavf7updiWWKVNRwU96Vrw&key=AIzaSyC-Qr_9Y10nFQMNzNtmOnuBf6QY3AuFCiw"
        }
    ]
}
```
