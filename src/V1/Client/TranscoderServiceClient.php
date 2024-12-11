<?php
/*
 * Copyright 2024 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/cloud/video/transcoder/v1/services.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Video\Transcoder\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\PagedListResponse;
use Google\ApiCore\ResourceHelperTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Video\Transcoder\V1\CreateJobRequest;
use Google\Cloud\Video\Transcoder\V1\CreateJobTemplateRequest;
use Google\Cloud\Video\Transcoder\V1\DeleteJobRequest;
use Google\Cloud\Video\Transcoder\V1\DeleteJobTemplateRequest;
use Google\Cloud\Video\Transcoder\V1\GetJobRequest;
use Google\Cloud\Video\Transcoder\V1\GetJobTemplateRequest;
use Google\Cloud\Video\Transcoder\V1\Job;
use Google\Cloud\Video\Transcoder\V1\JobTemplate;
use Google\Cloud\Video\Transcoder\V1\ListJobTemplatesRequest;
use Google\Cloud\Video\Transcoder\V1\ListJobsRequest;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Using the Transcoder API, you can queue asynchronous jobs for transcoding
 * media into various output formats. Output formats may include different
 * streaming standards such as HTTP Live Streaming (HLS) and Dynamic Adaptive
 * Streaming over HTTP (DASH). You can also customize jobs using advanced
 * features such as Digital Rights Management (DRM), audio equalization, content
 * concatenation, and digital ad-stitch ready content generation.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * Many parameters require resource names to be formatted in a particular way. To
 * assist with these names, this class includes a format method for each type of
 * name, and additionally a parseName method to extract the individual identifiers
 * contained within formatted names that are returned by the API.
 *
 * @method PromiseInterface<Job> createJobAsync(CreateJobRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<JobTemplate> createJobTemplateAsync(CreateJobTemplateRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<void> deleteJobAsync(DeleteJobRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<void> deleteJobTemplateAsync(DeleteJobTemplateRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<Job> getJobAsync(GetJobRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<JobTemplate> getJobTemplateAsync(GetJobTemplateRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listJobTemplatesAsync(ListJobTemplatesRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<PagedListResponse> listJobsAsync(ListJobsRequest $request, array $optionalArgs = [])
 */
final class TranscoderServiceClient
{
    use GapicClientTrait;
    use ResourceHelperTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.cloud.video.transcoder.v1.TranscoderService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'transcoder.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'transcoder.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = ['https://www.googleapis.com/auth/cloud-platform'];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/transcoder_service_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/transcoder_service_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/transcoder_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/transcoder_service_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Formats a string containing the fully-qualified path to represent a job
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $job
     *
     * @return string The formatted job resource.
     */
    public static function jobName(string $project, string $location, string $job): string
    {
        return self::getPathTemplate('job')->render([
            'project' => $project,
            'location' => $location,
            'job' => $job,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a job_template
     * resource.
     *
     * @param string $project
     * @param string $location
     * @param string $jobTemplate
     *
     * @return string The formatted job_template resource.
     */
    public static function jobTemplateName(string $project, string $location, string $jobTemplate): string
    {
        return self::getPathTemplate('jobTemplate')->render([
            'project' => $project,
            'location' => $location,
            'job_template' => $jobTemplate,
        ]);
    }

    /**
     * Formats a string containing the fully-qualified path to represent a location
     * resource.
     *
     * @param string $project
     * @param string $location
     *
     * @return string The formatted location resource.
     */
    public static function locationName(string $project, string $location): string
    {
        return self::getPathTemplate('location')->render([
            'project' => $project,
            'location' => $location,
        ]);
    }

    /**
     * Parses a formatted name string and returns an associative array of the components in the name.
     * The following name formats are supported:
     * Template: Pattern
     * - job: projects/{project}/locations/{location}/jobs/{job}
     * - jobTemplate: projects/{project}/locations/{location}/jobTemplates/{job_template}
     * - location: projects/{project}/locations/{location}
     *
     * The optional $template argument can be supplied to specify a particular pattern,
     * and must match one of the templates listed above. If no $template argument is
     * provided, or if the $template argument does not match one of the templates
     * listed, then parseName will check each of the supported templates, and return
     * the first match.
     *
     * @param string  $formattedName The formatted name string
     * @param ?string $template      Optional name of template to match
     *
     * @return array An associative array from name component IDs to component values.
     *
     * @throws ValidationException If $formattedName could not be matched.
     */
    public static function parseName(string $formattedName, ?string $template = null): array
    {
        return self::parseFormattedName($formattedName, $template);
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'transcoder.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Creates a job in the specified region.
     *
     * The async variant is {@see TranscoderServiceClient::createJobAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/create_job.php
     *
     * @param CreateJobRequest $request     A request to house fields associated with the call.
     * @param array            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Job
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createJob(CreateJobRequest $request, array $callOptions = []): Job
    {
        return $this->startApiCall('CreateJob', $request, $callOptions)->wait();
    }

    /**
     * Creates a job template in the specified region.
     *
     * The async variant is {@see TranscoderServiceClient::createJobTemplateAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/create_job_template.php
     *
     * @param CreateJobTemplateRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return JobTemplate
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function createJobTemplate(CreateJobTemplateRequest $request, array $callOptions = []): JobTemplate
    {
        return $this->startApiCall('CreateJobTemplate', $request, $callOptions)->wait();
    }

    /**
     * Deletes a job.
     *
     * The async variant is {@see TranscoderServiceClient::deleteJobAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/delete_job.php
     *
     * @param DeleteJobRequest $request     A request to house fields associated with the call.
     * @param array            $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteJob(DeleteJobRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('DeleteJob', $request, $callOptions)->wait();
    }

    /**
     * Deletes a job template.
     *
     * The async variant is {@see TranscoderServiceClient::deleteJobTemplateAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/delete_job_template.php
     *
     * @param DeleteJobTemplateRequest $request     A request to house fields associated with the call.
     * @param array                    $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function deleteJobTemplate(DeleteJobTemplateRequest $request, array $callOptions = []): void
    {
        $this->startApiCall('DeleteJobTemplate', $request, $callOptions)->wait();
    }

    /**
     * Returns the job data.
     *
     * The async variant is {@see TranscoderServiceClient::getJobAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/get_job.php
     *
     * @param GetJobRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return Job
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getJob(GetJobRequest $request, array $callOptions = []): Job
    {
        return $this->startApiCall('GetJob', $request, $callOptions)->wait();
    }

    /**
     * Returns the job template data.
     *
     * The async variant is {@see TranscoderServiceClient::getJobTemplateAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/get_job_template.php
     *
     * @param GetJobTemplateRequest $request     A request to house fields associated with the call.
     * @param array                 $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return JobTemplate
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function getJobTemplate(GetJobTemplateRequest $request, array $callOptions = []): JobTemplate
    {
        return $this->startApiCall('GetJobTemplate', $request, $callOptions)->wait();
    }

    /**
     * Lists job templates in the specified region.
     *
     * The async variant is {@see TranscoderServiceClient::listJobTemplatesAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/list_job_templates.php
     *
     * @param ListJobTemplatesRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listJobTemplates(ListJobTemplatesRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListJobTemplates', $request, $callOptions);
    }

    /**
     * Lists jobs in the specified region.
     *
     * The async variant is {@see TranscoderServiceClient::listJobsAsync()} .
     *
     * @example samples/V1/TranscoderServiceClient/list_jobs.php
     *
     * @param ListJobsRequest $request     A request to house fields associated with the call.
     * @param array           $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return PagedListResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function listJobs(ListJobsRequest $request, array $callOptions = []): PagedListResponse
    {
        return $this->startApiCall('ListJobs', $request, $callOptions);
    }
}
