# Filter Lists

filter-lists is a Laravel package for dealing with lists.
Especially, the results that have the type  **Illuminate\Database\Eloquent\Collection**

Include a paginated response and include these basic filters:
**page, limit, sort by, desc**.
```bash
// page (integer): get your list with a specific page.
// limit (integer): get your list with a limited number of returned records.
// sortBy (string): sort the results according to a column.
// desc (bool): determine the type of your sort. 
```
Include filters according to your model's columns.

Include filters according to "dateRange" attribute
```bash
// get your list that is created between two dates.
{
  "from": "string",
  "to": "string"
}
```
Include filters according to "fixRange" attribute
```bash
Available values: today, monthly, yearly
// get your list that is created today.
// get your list that is created in the current month.
// get your list that is created in the current year.
```

## Installation

Use the composer manager to install filter-lists.

```bash
cd your_project
composer require ahmadaldali/filter-lists
```

## Usage

```bash

# use the result's Trait && Request Facade
use AhmadAldali\FilterLists\Traits\ListsResult;
use Illuminate\Http\Request;

#In your controller, or where you want to use the filtering 
$collection = User::all(); #or any model
# then, call getTheResult function
$results = $this->getTheResult($collection , $request);

```

## Example
I create a route on my test application, that's called */list*.
In that route, I executed an action in a controller that contains the previous **Usage**.

**Get all results**
![alt text](https://github.com/ahmadaldali/filter-lists/blob/main/images/1%20git%20all%20results.png)

**Apply limit**

**Apply limit with page**

**Apply condition**

**Apply condition with wrong value**


## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.


## License
[MIT](https://choosealicense.com/licenses/mit/)
