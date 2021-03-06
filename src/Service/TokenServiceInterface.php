<?php
/**
 * @see https://github.com/dotkernel/dot-user/ for the canonical source repository
 * @copyright Copyright (c) 2017 Apidemia (https://www.apidemia.com)
 * @license https://github.com/dotkernel/dot-user/blob/master/LICENSE.md MIT License
 */

declare(strict_types = 1);

namespace Dot\User\Service;

use Dot\User\Entity\ConfirmTokenEntity;
use Dot\User\Entity\RememberTokenEntity;
use Dot\User\Entity\ResetTokenEntity;
use Dot\User\Entity\UserEntity;
use Dot\User\Result\Result;

/**
 * Interface TokenServiceInterface
 * @package Dot\User\Service
 */
interface TokenServiceInterface
{
    /**
     * @param UserEntity $user
     * @param string $token
     * @return ConfirmTokenEntity|null
     */
    public function findConfirmToken(UserEntity $user, string $token): ?ConfirmTokenEntity;

    /**
     * @param UserEntity $user
     * @return array
     */
    public function findConfirmTokens(UserEntity $user): array;

    /**
     * @param UserEntity $user
     * @return int
     */
    public function deleteConfirmTokens(UserEntity $user): int;

    /**
     * @param ConfirmTokenEntity $token
     * @return mixed
     */
    public function deleteConfirmToken(ConfirmTokenEntity $token);

    /**
     * @param UserEntity $user
     * @param array $mapperOptions
     * @return Result
     */
    public function generateConfirmToken(UserEntity $user, array $mapperOptions = []): Result;

    /**
     * @param UserEntity $user
     * @param array $mapperOptions
     * @return Result
     */
    public function generateRememberToken(UserEntity $user, array $mapperOptions = []): Result;

    /**
     * @param RememberTokenEntity $token
     */
    public function generateRememberCookie(RememberTokenEntity $token);

    /**
     * @return mixed
     */
    public function clearRememberCookie();

    /**
     * @param string $selector
     * @param string $clearToken
     * @return Result
     */
    public function validateRememberToken(string $selector, string $clearToken): Result;

    /**
     * @param array $conditions
     * @return int
     */
    public function deleteRememberTokens(array $conditions): int;

    /**
     * @param RememberTokenEntity $token
     * @return mixed
     */
    public function deleteRememberToken(RememberTokenEntity $token);

    /**
     * @param UserEntity $user
     * @param string $token
     * @return ResetTokenEntity|null
     */
    public function findResetToken(UserEntity $user, string $token): ?ResetTokenEntity;

    /**
     * @param UserEntity $user
     * @return array
     */
    public function findResetTokens(UserEntity $user): array;

    /**
     * @param UserEntity $user
     * @param array $mapperOptions
     * @return Result
     */
    public function generateResetToken(UserEntity $user, array $mapperOptions = []): Result;

    /**
     * @param UserEntity $user
     * @return int
     */
    public function deleteResetTokens(UserEntity $user): int;

    /**
     * @param ResetTokenEntity $token
     * @return mixed
     */
    public function deleteResetToken(ResetTokenEntity $token);
}
