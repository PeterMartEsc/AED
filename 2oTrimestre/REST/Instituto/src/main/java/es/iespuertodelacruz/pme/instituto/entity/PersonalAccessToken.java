package es.iespuertodelacruz.pme.instituto.entity;

import java.io.Serializable;
import jakarta.persistence.*;
import java.sql.Timestamp;
import java.math.BigInteger;


/**
 * The persistent class for the personal_access_tokens database table.
 * 
 */
@Entity
@Table(name="personal_access_tokens")
@NamedQuery(name="PersonalAccessToken.findAll", query="SELECT p FROM PersonalAccessToken p")
public class PersonalAccessToken implements Serializable {
	private static final long serialVersionUID = 1L;

	@Id
	@GeneratedValue(strategy=GenerationType.IDENTITY)
	@Column(unique=true, nullable=false)
	private long id;

	@Lob
	private String abilities;

	@Column(name="created_at")
	private Timestamp createdAt;

	@Column(name="expires_at")
	private Timestamp expiresAt;

	@Column(name="last_used_at")
	private Timestamp lastUsedAt;

	@Column(nullable=false, length=255)
	private String name;

	@Column(nullable=false, length=64)
	private String token;

	@Column(name="tokenable_id", nullable=false)
	private BigInteger tokenableId;

	@Column(name="tokenable_type", nullable=false, length=255)
	private String tokenableType;

	@Column(name="updated_at")
	private Timestamp updatedAt;

	public PersonalAccessToken() {
	}

	public long getId() {
		return this.id;
	}

	public void setId(long id) {
		this.id = id;
	}

	public String getAbilities() {
		return this.abilities;
	}

	public void setAbilities(String abilities) {
		this.abilities = abilities;
	}

	public Timestamp getCreatedAt() {
		return this.createdAt;
	}

	public void setCreatedAt(Timestamp createdAt) {
		this.createdAt = createdAt;
	}

	public Timestamp getExpiresAt() {
		return this.expiresAt;
	}

	public void setExpiresAt(Timestamp expiresAt) {
		this.expiresAt = expiresAt;
	}

	public Timestamp getLastUsedAt() {
		return this.lastUsedAt;
	}

	public void setLastUsedAt(Timestamp lastUsedAt) {
		this.lastUsedAt = lastUsedAt;
	}

	public String getName() {
		return this.name;
	}

	public void setName(String name) {
		this.name = name;
	}

	public String getToken() {
		return this.token;
	}

	public void setToken(String token) {
		this.token = token;
	}

	public BigInteger getTokenableId() {
		return this.tokenableId;
	}

	public void setTokenableId(BigInteger tokenableId) {
		this.tokenableId = tokenableId;
	}

	public String getTokenableType() {
		return this.tokenableType;
	}

	public void setTokenableType(String tokenableType) {
		this.tokenableType = tokenableType;
	}

	public Timestamp getUpdatedAt() {
		return this.updatedAt;
	}

	public void setUpdatedAt(Timestamp updatedAt) {
		this.updatedAt = updatedAt;
	}

}