<?php

namespace App\Http\GraphQL\Mutations;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Joselfonseca\LighthouseGraphQLPassport\GraphQL\Mutations\Login as LoginGraphQLPassport;

class Login extends LoginGraphQLPassport
{
    /**
     * @param null $rootValue Usually contains the result returned from the parent field. In this case, it is always `null`.
     * @param array $args The arguments that were passed into the field.
     * @param GraphQLContext|null $context Arbitrary data that is shared between all fields of a single query.
     * @param ResolveInfo $resolveInfo Information about the query itself, such as the execution state, the field name, path to the field from the root, and more.                $resolveInfo
     *
     * @throws \Exception
     *
     * @return array
     */
    public function resolve($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $credentials = $this->buildCredentials($args);
        $response = $this->makeRequest($credentials);
        $model = app(config('auth.providers.users.model'));
        $user = $model->where(config('lighthouse-graphql-passport.username'), $args['username'])->firstOrFail();
        $response['user'] = $user;

        return $response;
    }
}
