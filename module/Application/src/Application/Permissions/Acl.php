<?php

/**
 * File for handling Access Control List
 *
 * @category   Application
 * @package    Application\Permissions
 * @copyright  Copyright (c) 2014, Titane Support
 * @license    http://www.wtfpl.net WTFPL
 */

/**
 * @namespace Application\Permissions
 */
namespace Application\Permissions;

/**
 * @uses Zend\Permissions\Acl\Acl
 * @uses Zend\Permissions\Acl\Role\GenericRole
 * @uses Zend\Permissions\Acl\Resource\GenericResource
 */
use Zend\Permissions\Acl\Acl as ZendAcl,
    Zend\Permissions\Acl\Role\GenericRole as Role,
    Zend\Permissions\Acl\Resource\GenericResource as Resource;

/**
 * Class to handle Access Control List
 *
 * @category   Application
 * @package    Application\Permissions
 * @copyright  Copyright (c) 2014, Titane Support
 * @license    http://www.wtfpl.net WTFPL
 */
class Acl extends ZendAcl {

    /**
     * @var string Default Role.
     */
    const DEFAULT_ROLE_NAME = 'visiteur';

    /**
     * Constructor.
     *
     * @param array $config
     * @throws \Exception
     */
    public function __construct(array $config) {
        
        if (!isset($config['roles']) || !isset($config['resources']) || !isset($config['privileges'])) {
            throw new \Exception('Invalid ACL Config found');
        }

        $roles = $config['roles'];
        if (!isset($roles[self::DEFAULT_ROLE_NAME])) {
            $roles[self::DEFAULT_ROLE_NAME] = null;
        }

        $this->addRoles($roles)
                ->addResources($config['resources'])
                ->addPrivileges($config['privileges']);
    }

    /**
     * Adds Roles to ACL.
     *
     * @param array $roles
     * @return Acl
     */
    protected function addRoles(array $roles) {
        
        foreach ($roles as $name => $parent) {
            if ($this->hasRole($name)) {
                continue;
            }
            if (empty($parent)) {
                $parent = [];
            }
            if (is_string($parent)) {
                $parent = [$parent];
            }
            $this->addRole(new Role($name), $parent);
        }
        return $this;
    }

    /**
     * Adds Resources to ACL.
     *
     * @param array $resources
     * @return Acl
     */
    protected function addResources(array $resources) {
        
        foreach ($resources as $resource => $controller) {
            if ($this->hasResource($resource)) {
                continue;
            }
            $this->addResource(new Resource($resource));
        }
        return $this;
    }

    /**
     * Adds Privileges to ACL.
     *
     * @param array $privileges
     * @return Acl
     * @throws \Exception
     */
    protected function addPrivileges(array $privileges) {
        
        foreach ($privileges as $role => $resources) {
            if (!$this->hasRole($role)) {
                throw new \Exception('No valid role defined: ' . $role);
            }
            $this->permissions($this->getRole($role), $resources);
        }
        return $this;
    }

    /**
     * Parse permissions.
     *
     * @param Role $role
     * @param array $resources
     * @return Acl
     * @throws \Exception
     */
    private function permissions(Role $role, array $resources) {
        
        foreach ($resources as $resource => $permissions) {
            if (!$this->hasResource($resource)) {
                throw new \Exception('No valid resource defined: ' . $resource);
            }
            if (empty($permissions)) {
                $this->deny($role, $resource);
                continue;
            }
            $this->permission($role, $this->getResource($resource), $permissions);
        }
    }

    /**
     * Create authorization.
     *
     * @param Role $role
     * @param Resource $resource
     * @param array $permissions
     * @return Acl
     * @throws \Exception
     */
    private function permission(Role $role, Resource $resource, array $permissions) {
        
        foreach ($permissions as $key => $permission) {
            if ($key === 'deny' || $key === 'removeAllow') {
                $this->removePermissions($role, $resource, $permission);
                continue;
            }
            if ($permission === 'all') {
                $permission = null;
            }
            $this->allow($role, $resource, $permission);
        }
    }

    /**
     * Remove authorization.
     *
     * @param Role $role
     * @param Resource $resource
     * @param array $permissions
     * @return Acl
     * @throws \Exception
     */
    private function removePermissions(Role $role, Resource $resource, array $permissions) {
        
        foreach ($permissions as $permission) {
            $this->removeAllow($role, $resource, $permission);
            $this->deny($role, $resource, $permission);
        }
    }

}
