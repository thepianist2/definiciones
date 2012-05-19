CREATE TABLE categoria (id BIGINT AUTO_INCREMENT, texto text NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE categoriaContenido (id BIGINT AUTO_INCREMENT, texto text NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contenido (id BIGINT AUTO_INCREMENT, idusuario BIGINT NOT NULL, idcategoriacontenido BIGINT NOT NULL, titulo VARCHAR(255) NOT NULL, contenido text NOT NULL, borrado TINYINT(1) DEFAULT '0' NOT NULL, activo TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idusuario_idx (idusuario), INDEX idcategoriacontenido_idx (idcategoriacontenido), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE definicion (idpalabra BIGINT, texto TEXT NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(idpalabra)) ENGINE = INNODB;
CREATE TABLE funcionalidad (id BIGINT AUTO_INCREMENT, idmodulo BIGINT NOT NULL, credencial VARCHAR(50) NOT NULL, descripcion TEXT NOT NULL, aplicacion VARCHAR(255) NOT NULL, INDEX idmodulo_idx (idmodulo), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE modulo (id BIGINT AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, descripcion TEXT NOT NULL, activo TINYINT DEFAULT '0' NOT NULL, tienepublicidad TINYINT DEFAULT '0' NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE palabra (id BIGINT AUTO_INCREMENT, idusuario BIGINT NOT NULL, idsubcategoria BIGINT NOT NULL, textopalabra text NOT NULL, textodefinicion text NOT NULL, borrado TINYINT(1) DEFAULT '0' NOT NULL, activo TINYINT(1) DEFAULT '0' NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idusuario_idx (idusuario), INDEX idsubcategoria_idx (idsubcategoria), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE palabraCategoria (id BIGINT AUTO_INCREMENT, texto TEXT NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE palabraSubcategoria (idpalabracategoria BIGINT, texto TEXT NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(idpalabracategoria)) ENGINE = INNODB;
CREATE TABLE perfil (id BIGINT AUTO_INCREMENT, nombre VARCHAR(50) NOT NULL, descripcion TEXT NOT NULL, activo TINYINT DEFAULT '0' NOT NULL, editable TINYINT DEFAULT '0' NOT NULL, borrado TINYINT DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE permiso (idperfil BIGINT, idfuncionalidad BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(idperfil, idfuncionalidad)) ENGINE = INNODB;
CREATE TABLE registroDefinicion (iddefinicion BIGINT, textoanterior TEXT NOT NULL, textoposterior TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(iddefinicion)) ENGINE = INNODB;
CREATE TABLE registroPalabra (idpalabra BIGINT, textopalabraanterior text NOT NULL, textopalabraposterior text NOT NULL, textodefinicionanterior text NOT NULL, textodefinicionposterior text NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(idpalabra)) ENGINE = INNODB;
CREATE TABLE respuesta (id BIGINT AUTO_INCREMENT, idtest BIGINT NOT NULL, textorespuesta text NOT NULL, respuestacorrecta TINYINT(1) DEFAULT '0' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idtest_idx (idtest), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128) NOT NULL, is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
CREATE TABLE subCategoria (id BIGINT AUTO_INCREMENT, idcategoria BIGINT NOT NULL, texto text NOT NULL, imagen VARCHAR(255), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idcategoria_idx (idcategoria), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE test (id BIGINT AUTO_INCREMENT, idusuario BIGINT NOT NULL, idpalabra BIGINT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idusuario_idx (idusuario), INDEX idpalabra_idx (idpalabra), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE usuario (id BIGINT AUTO_INCREMENT, idperfil BIGINT NOT NULL, login VARCHAR(150) NOT NULL, password VARCHAR(40) NOT NULL, email VARCHAR(150) NOT NULL, nombre VARCHAR(100) NOT NULL, apellidos VARCHAR(150), facebook VARCHAR(150), twitter VARCHAR(150), activo TINYINT DEFAULT '1' NOT NULL, validado TINYINT DEFAULT '0' NOT NULL, borrado TINYINT DEFAULT '0' NOT NULL, lang VARCHAR(4) DEFAULT 'es' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX idperfil_idx (idperfil), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE contenido ADD CONSTRAINT contenido_idusuario_sf_guard_user_id FOREIGN KEY (idusuario) REFERENCES sf_guard_user(id);
ALTER TABLE contenido ADD CONSTRAINT contenido_idcategoriacontenido_categoriaContenido_id FOREIGN KEY (idcategoriacontenido) REFERENCES categoriaContenido(id);
ALTER TABLE funcionalidad ADD CONSTRAINT funcionalidad_idmodulo_modulo_id FOREIGN KEY (idmodulo) REFERENCES modulo(id);
ALTER TABLE palabra ADD CONSTRAINT palabra_idusuario_sf_guard_user_id FOREIGN KEY (idusuario) REFERENCES sf_guard_user(id);
ALTER TABLE palabra ADD CONSTRAINT palabra_idsubcategoria_subCategoria_id FOREIGN KEY (idsubcategoria) REFERENCES subCategoria(id);
ALTER TABLE permiso ADD CONSTRAINT permiso_idperfil_perfil_id FOREIGN KEY (idperfil) REFERENCES perfil(id);
ALTER TABLE permiso ADD CONSTRAINT permiso_idfuncionalidad_funcionalidad_id FOREIGN KEY (idfuncionalidad) REFERENCES funcionalidad(id);
ALTER TABLE respuesta ADD CONSTRAINT respuesta_idtest_test_id FOREIGN KEY (idtest) REFERENCES test(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE subCategoria ADD CONSTRAINT subCategoria_idcategoria_categoria_id FOREIGN KEY (idcategoria) REFERENCES categoria(id);
ALTER TABLE test ADD CONSTRAINT test_idusuario_sf_guard_user_id FOREIGN KEY (idusuario) REFERENCES sf_guard_user(id);
ALTER TABLE test ADD CONSTRAINT test_idpalabra_palabra_id FOREIGN KEY (idpalabra) REFERENCES palabra(id);
ALTER TABLE usuario ADD CONSTRAINT usuario_idperfil_perfil_id FOREIGN KEY (idperfil) REFERENCES perfil(id);
