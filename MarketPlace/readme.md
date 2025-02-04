# Marketplace API Enhancement

This repository contains modifications for an existing marketplace backend API. The changes introduce new functionality while ensuring backward compatibility.

## Features Implemented

- **Favorites System**: 
  - Users can add/remove products from favorites.
  - Favorited products are marked accordingly in the product list.
  - A new endpoint allows fetching the user's favorite products.
  - Only authenticated users can access favorites.
  
- **Multiple Product Images Support**:
  - Products now support multiple images instead of a single image.
  - Existing images remain in the current storage.
  - New images are stored in AWS S3.
  - The API response includes both `image_url` (for backward compatibility) and `image_urls` (new feature).

## API Documentation

The API changes follow **RESTful best practices** and ensure compatibility with existing clients.

### Product Listing (Modified)

```http
GET /products?category=category-1&sort=name HTTP/1.1
Host: api.market.com
Authorization: Bearer {token}
Accept: application/json
```

#### Response Example:
```json
[
    {
        "id": 1,
        "name": "Example Product 1",
        "description": "Example product 1 description",
        "image_url": "https://cdn.market.com/images/product_1.png",
        "image_urls": [
            "https://cdn.market.com/images/product_1.png",
            "https://s3.amazonaws.com/market/images/product_1_2.jpg"
        ],
        "category": "category-1",
        "is_favorite": true
    }
]
```

### Favorite Management Endpoints

#### Add Product to Favorites
```http
POST /favorites/{productId}
```
#### Remove Product from Favorites
```http
DELETE /favorites/{productId}
```
#### Get Favorite Products
```http
GET /favorites
```

## Installation & Setup

### Clone the repository:
```sh
git clone https://github.com/your-username/marketplace-api-enhancement.git
cd marketplace-api-enhancement
```

### Swagger Documentation
The OpenAPI (Swagger) documentation is available in `docs/api.yaml`. To view it:
- Use **Swagger UI** or **Redocly**.
- Or run `php -S localhost:8000 -t docs/` to serve it locally.

## Contribution
Feel free to fork and submit pull requests if you want to improve this API further.

## License
This project is licensed under the MIT License.
