<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Input asset.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1.Input</code>
 */
class Input extends \Google\Protobuf\Internal\Message
{
    /**
     * A unique key for this input. Must be specified when using advanced
     * mapping and edit lists.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     */
    protected $key = '';
    /**
     * URI of the media. Input files must be at least 5 seconds in duration and
     * stored in Cloud Storage (for example, `gs://bucket/inputs/file.mp4`).
     * If empty, the value will be populated from `Job.input_uri`.
     *
     * Generated from protobuf field <code>string uri = 2;</code>
     */
    protected $uri = '';
    /**
     * Preprocessing configurations.
     *
     * Generated from protobuf field <code>.google.cloud.video.transcoder.v1.PreprocessingConfig preprocessing_config = 3;</code>
     */
    protected $preprocessing_config = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $key
     *           A unique key for this input. Must be specified when using advanced
     *           mapping and edit lists.
     *     @type string $uri
     *           URI of the media. Input files must be at least 5 seconds in duration and
     *           stored in Cloud Storage (for example, `gs://bucket/inputs/file.mp4`).
     *           If empty, the value will be populated from `Job.input_uri`.
     *     @type \Google\Cloud\Video\Transcoder\V1\PreprocessingConfig $preprocessing_config
     *           Preprocessing configurations.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * A unique key for this input. Must be specified when using advanced
     * mapping and edit lists.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * A unique key for this input. Must be specified when using advanced
     * mapping and edit lists.
     *
     * Generated from protobuf field <code>string key = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->key = $var;

        return $this;
    }

    /**
     * URI of the media. Input files must be at least 5 seconds in duration and
     * stored in Cloud Storage (for example, `gs://bucket/inputs/file.mp4`).
     * If empty, the value will be populated from `Job.input_uri`.
     *
     * Generated from protobuf field <code>string uri = 2;</code>
     * @return string
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**
     * URI of the media. Input files must be at least 5 seconds in duration and
     * stored in Cloud Storage (for example, `gs://bucket/inputs/file.mp4`).
     * If empty, the value will be populated from `Job.input_uri`.
     *
     * Generated from protobuf field <code>string uri = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setUri($var)
    {
        GPBUtil::checkString($var, True);
        $this->uri = $var;

        return $this;
    }

    /**
     * Preprocessing configurations.
     *
     * Generated from protobuf field <code>.google.cloud.video.transcoder.v1.PreprocessingConfig preprocessing_config = 3;</code>
     * @return \Google\Cloud\Video\Transcoder\V1\PreprocessingConfig|null
     */
    public function getPreprocessingConfig()
    {
        return $this->preprocessing_config;
    }

    public function hasPreprocessingConfig()
    {
        return isset($this->preprocessing_config);
    }

    public function clearPreprocessingConfig()
    {
        unset($this->preprocessing_config);
    }

    /**
     * Preprocessing configurations.
     *
     * Generated from protobuf field <code>.google.cloud.video.transcoder.v1.PreprocessingConfig preprocessing_config = 3;</code>
     * @param \Google\Cloud\Video\Transcoder\V1\PreprocessingConfig $var
     * @return $this
     */
    public function setPreprocessingConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Video\Transcoder\V1\PreprocessingConfig::class);
        $this->preprocessing_config = $var;

        return $this;
    }

}

