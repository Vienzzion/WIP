<?php
/**
 * Eadrax
 *
 * Eadrax is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * Eadrax is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *                                                                                
 * You should have received a copy of the GNU General Public License
 * along with Eadrax; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @category	Eadrax
 * @package		User
 * @author		Eadrax Team
 * @copyright	Copyright (C) 2009 Eadrax Team
 */

defined('SYSPATH') or die('No direct script access.');

/**
 *
 * Model for the users table.
 *
 * @category	Eadrax
 * @package		User
 * @subpackage	Models
 * @author		Eadrax Team
 * @copyright	Copyright (C) 2009 Eadrax Team
 * @version		$Id$
 */
class User_Model extends ORM {
	/**
	 * Adds a new basic user row.
	 *
	 * @return null
	 */
	public function add_user($username, $password)
	{
		$add_user = $this->db;
		$add_user->set('username', $username);
		$add_user->set('password', md5($password));
		$add_user->insert('users');
	}

	/**
	 * Checks if a username is unique.
	 *
	 * TRUE if yes, else FALSE.
	 *
	 * @param array $post The array containing the username to check.
	 *
	 * @return bool
	 */
	public function unique_user_name($post)
	{
		$count = $this->db->from('users')->where('username', $post['openid_identifier'])->get()->count();
		if ($count >= 1)
		{
			$post->add_error('openid_identifier', 'unique');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	/**
	 * Checks if a user exists.
	 *
	 * @param int $uid The user ID to check.
	 *
	 * @return bool
	 */
	public function check_user_exists($uid)
	{
		$check_exists = $this->db->from('users')->where(array('id' => $uid))->get()->count();

		if ($check_exists >= 1)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Returns all the data about a user with the id $uid.
	 *
	 * @param int $uid
	 * 
	 * @return array
	 */
	public function user_information($uid)
	{
		$user_information = new Database();
		$user_information = $user_information->where('id', $uid);
		$user_information = $user_information->get('users');
		$user_information = $user_information->result(FALSE);
		$user_information = $user_information->current();

		return $user_information;
	}

	/**
	 * Returns uid based on username.
	 *
	 * @param string $username
	 *
	 * @return mixed
	 */
	public function uid($username)
	{
		$find_uid = $this->db->from('users')->where('username', $username)->get();
		if ($find_uid->count() == 0) {
			return FALSE;
		} else {
			$find_uid = $find_uid->current();
			return $find_uid->id;
		}
	}

	/**
	 * Edits a user with the data specified in $data.
	 *
	 * @param array $data An array with field_name=>content for data to add.
	 * @param int   $uid  The uid to edit.
	 *
	 * @return int
	 */
	public function manage_user($data, $uid)
	{
		$manage_user = $this->db;
		foreach ($data as $key => $value)
		{
			$manage_user->set($key, $value);
		}

		$manage_user->where('id', $uid);
		$manage_user->update('users');

		return $uid;
	}

	/**
	 * Updates a user's lastactive time.
	 *
	 * @param int   $uid  The uid to change.
	 *
	 * @return null
	 */
	public function log_user($uid)
	{
		$this->db->set('lastactive', time())->where('id', $uid)->update('users');
	}

	/**
	 * Features an update for a user.
	 *
	 * @param int $uid The user id.
	 * @param int $upid The update id.
	 *
	 * @return null
	 */
	public function feature($uid, $upid)
	{
		$this->db->set('featured', $upid)->where('id', $uid)->update('users');
	}
}
