<h1 align="center">Laravel Demo Application</h1>

<div align="center">
  <strong>Demonstration of Laravel Routes</strong>
</div>

<br>

### Basic Routes:

1. **Home Route:**
   - Route: `/`
   - Description: Displays a welcome message.

2. **Blog Route:**
   - Route: `/blog`
   - Description: Returns a simple text response: "Hello World."

3. **Array Route:**
   - Route: `/array`
   - Description: Returns an associative array with first name and last name.

4. **Request Route:**
   - Route: `/request`
   - Description: Accepts a `name` parameter from the query string and returns an array containing the provided name, age (default value is 23), current path, and URL.

### Route with Parameters and Prefix:

1. **Slug Index Route:**
   - Route: `/blog`
   - Description: Returns an array with a link to the `slug.show` route. Demonstrates named routes.

2. **Slug Show Route:**
   - Route: `/blog/{slug}/{id}`
   - Description: Accepts `slug` and `id` as parameters and returns an array containing these values. The `slug` parameter must be alphanumeric with dashes, and the `id` parameter must be numeric.

### Explanation of Code:

1. **`use Illuminate\Support\Facades\Route;`**
   - Explanation: Imports the Route facade from Laravel, allowing you to define routes.

2. **`use Illuminate\Http\Request;`**
   - Explanation: Imports the Request class, enabling you to handle HTTP requests and access request data.
   <p align="center">Made with ❤️ by Jalil Betroji</p>

[jalil Betroji](https://github.com/Jalil-Betroji)