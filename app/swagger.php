<?php

define('API_HOST', 'api.starterkit.app');

/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host=API_HOST,
 *     basePath="/v1",
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="StarterKit API",
 *         description="Demonstração da documentação da api gerada utilizando swagger com php",
 *         @SWG\Contact(
 *             email="lfalmeida@me.com"
 *         )
 *     )
 * )
 */

/**
 * @SWG\SecurityScheme(
 *   securityDefinition="token",
 *   type="apiKey",
 *   in="header",
 *   name="token"
 * )
 */

/**
 * @SWG\Tag(
 *   name="Users",
 *   description="Operações relacionadas aos usuários",
 * )
 * @SWG\Tag(
 *   name="ZipCode",
 *   description="Consultas de cep"
 * )
 */

/**
 *
 * @SWG\Definition(
 *     type="object",
 *     definition="User",
 *     required={"email", "name"},
 *     @SWG\Property(property="email", type="string"),
 *     @SWG\Property(property="password", type="string"),
 *     @SWG\Property(property="name", type="string"),
 * )
 *
 *      @SWG\Definition(
 *     type="object",
 *     definition="Error",
 * 			required={"status", "code", "message"},
 *			@SWG\Property(property="status", type="string"),
 *			@SWG\Property(property="code", type="integer"),
 *			@SWG\Property(property="message", type="string"),
 * 		),
 * */

