# Filter Lists

**filter-lists** is a Laravel package designed to simplify filtering, sorting, and paginating Eloquent collections or query results. It is particularly useful for APIs or backend systems where you need dynamic filtering on model collections with minimal setup.

---

## Features

- Pagination support with `page` and `limit`.
- Sorting by any column with `sortBy` and order direction via `desc`.
- Filtering by model columns (e.g., `name`, `email`, `is_admin`).
- Date range filtering by `dateRange` attribute (filter records between two dates).
- Fixed range filtering by `fixRange` attribute (today, current month, or current year).

---

## Requirements

- Laravel Framework `>= 8`

---

## Installation

Install via Composer in your Laravel project root:

```php
composer require ahmadaldali/filter-lists
```

## Usage

### Step 1: Import Trait

```php
use AhmadAldali\FilterLists\Traits\FilterableResponse;
```

### Step 2: Use in your Controller or Service

```php
class UserController extends Controller
{
    use FilterableResponse;

    public function index(Request $request)
    {
        // Retrieve your collection or query builder
        $collection = User::all();

        // Apply filtering, sorting, and pagination based on request
        $results = $this->applyFilters($collection, $request);

        return response()->json($results);
    }
}
```

## Filters & Parameters

| Parameter | Type    | Description                                                  | Example             |
| --------- | ------- | ------------------------------------------------------------ | ------------------- |
| `page`    | integer | Page number for pagination                                   | `page=2`            |
| `limit`   | integer | Number of records per page                                   | `limit=10`          |
| `sortBy`  | string  | Column name to sort by                                       | `sortBy=created_at` |
| `desc`    | boolean | Sort direction: `true` for descending, `false` for ascending | `desc=true`         |

## Filtering by model columns
You can filter the list by any valid column of your model, for example:

```bash
?name=John&email=john@example.com&is_admin=1
```
This will apply WHERE conditions on those columns.

## Date Range Filter
Use the `dateRange` parameter with JSON containing `from` and `to` dates to filter records created within that range.
```json
{
  "dateRange": {
    "from": "2023-01-01",
    "to": "2023-01-31"
  }
}
```

## Fixed Range Filter
Filter by fixed time ranges with the fixRange parameter. Allowed values:

* today — records created today.

* monthly — records created this month.

* yearly — records created this year.

Example
```bash
?fixRange=today
```


## Example
I created a route on my test application, that's called */list*.

In that route, I executed an action in a controller that contains the previous **Usage**.

**Get all results**

![alt text](https://github.com/ahmadaldali/filter-lists/blob/main/images/1%20git%20all%20results.png)


**Apply limit**

![alt text](https://github.com/ahmadaldali/filter-lists/blob/main/images/2%20apply%20limit.png)


**Apply limit with page**

![alt text](https://github.com/ahmadaldali/filter-lists/blob/main/images/3%20apply%20limit%20with%20page.png)

**Apply condition**

![alt text](https://github.com/ahmadaldali/filter-lists/blob/main/images/4%20apply%20condition%20on%20column's%20name.png)


**Apply condition with wrong value**

![alt text](https://github.com/ahmadaldali/filter-lists/blob/main/images/5%20apply%20condition%20with%20wrong%20value.png)


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Welcome to any suggestion.


## License
[MIT](https://choosealicense.com/licenses/mit/)
