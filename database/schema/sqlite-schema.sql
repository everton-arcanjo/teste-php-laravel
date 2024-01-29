CREATE TABLE IF NOT EXISTS "migrations" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "migration" VARCHAR NOT NULL,
    "batch" INTEGER NOT NULL
);

/*CREATE TABLE IF NOT EXISTS "users" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" VARCHAR NOT NULL,
    "email" VARCHAR NOT NULL,
    "email_verified_at" DATETIME,
    "password" VARCHAR NOT NULL,
    "remember_token" VARCHAR,
    "created_at" DATETIME,
    "updated_at" DATETIME
);

CREATE UNIQUE INDEX "users_email_unique" ON "users" ("email");

CREATE TABLE IF NOT EXISTS "password_reset_tokens" (
    "email" VARCHAR NOT NULL,
    "token" VARCHAR NOT NULL,
    "created_at" DATETIME,
    PRIMARY KEY ("email")
);

CREATE TABLE IF NOT EXISTS "failed_jobs" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "uuid" VARCHAR NOT NULL,
    "connection" TEXT NOT NULL,
    "queue" TEXT NOT NULL,
    "payload" TEXT NOT NULL,
    "exception" TEXT NOT NULL,
    "failed_at" DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE UNIQUE INDEX "failed_jobs_uuid_unique" ON "failed_jobs" ("uuid");

CREATE TABLE IF NOT EXISTS "personal_access_tokens" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "tokenable_type" VARCHAR NOT NULL,
    "tokenable_id" INTEGER NOT NULL,
    "name" VARCHAR NOT NULL,
    "token" VARCHAR NOT NULL,
    "abilities" TEXT,
    "last_used_at" DATETIME,
    "expires_at" DATETIME,
    "created_at" DATETIME,
    "updated_at" DATETIME
);

CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "personal_access_tokens" ("tokenable_type", "tokenable_id");
CREATE UNIQUE INDEX "personal_access_tokens_token_unique" ON "personal_access_tokens" ("token");

CREATE TABLE IF NOT EXISTS "categories" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "name" VARCHAR NOT NULL,
    "created_at" DATETIME,
    "updated_at" DATETIME
);

CREATE TABLE IF NOT EXISTS "documents" (
    "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
    "created_at" DATETIME,
    "updated_at" DATETIME,
    "category_id" INTEGER NOT NULL,
    "title" VARCHAR NOT NULL,
    "contents" TEXT NOT NULL,
    FOREIGN KEY ("category_id") REFERENCES "categories" ("id") ON DELETE CASCADE
);*/