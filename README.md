1) POST /api/orders
curl --location --request GET 'http://127.0.0.1:8000/api/orders' \
--data '{
    "name": "John Doe",
    "delivery_address": "123 Main St",
    "order_items": [
        {
            "id": 1,
            "quantity": 2
        },
        {
            "id": 2,
            "quantity": 1
        }
    ],
    "delivery_option": "standard"
}'


2) Get Request -- api/orders/?status=pending
curl --location 'http://127.0.0.1:8000/api/orders/?status=pending' \


3) Patch Request-- /api/orders
curl --location --request PATCH 'http://127.0.0.1:8000/api/orders/1?status=pending' \


4) php artisan orders:process-delayed
