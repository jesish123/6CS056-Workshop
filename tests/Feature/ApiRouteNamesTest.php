<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiRouteNamesTest extends TestCase
{
    public function test_api_routes_do_not_override_web_route_names(): void
    {
        $routes = app('router')->getRoutes();

        $this->assertSame('courses', $routes->getByName('courses.index')->uri());
        $this->assertSame('api/courses', $routes->getByName('api.courses.index')->uri());
        $this->assertSame('students', $routes->getByName('students.index')->uri());
        $this->assertSame('api/students', $routes->getByName('api.students.index')->uri());
    }
}
